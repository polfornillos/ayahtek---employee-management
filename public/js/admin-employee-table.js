// ! Sample Employee data
// Changing icons when sorting
const headerLinks = document.querySelectorAll('.header-link');
let currentSortedColumn = null;

// Click event listeners to header links for sorting
headerLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const currentSortOrder = link.getAttribute('data-sort-order');
        const newSortOrder = currentSortOrder === 'asc' ? 'desc' : 'asc';
        link.setAttribute('data-sort-order', newSortOrder);

        // Resetting sort icons for other columns
        resetSortIcons(link);

        const sortIcon = link.querySelector('.sort-icon');

        // Changing sort icon based on sort order
        if (newSortOrder === 'desc') {
            sortIcon.classList.remove('fa-sort-down');
            sortIcon.classList.add('fa-sort-up');
        } else {
            sortIcon.classList.remove('fa-sort-up');
            sortIcon.classList.add('fa-sort-down');
        }

        currentSortedColumn = link;

        // Sorting the table based on the clicked header link
        sortTable(link);
    });
});

// Sorting the table function
function sortTable(link) {
  const table = link.closest('table');
  const columnIndex = Array.from(link.parentElement.parentElement.children).indexOf(link.parentElement);
  const tbody = table.querySelector('tbody');

  // Get only the rows on the current page
  const currentPageRows = Array.from(tbody.querySelectorAll('tr:not([style*="display: none"])'));

  currentPageRows.sort((a, b) => {
    const aValue = a.children[columnIndex].textContent;
    const bValue = b.children[columnIndex].textContent;

    if (link.getAttribute('data-sort-order') === 'asc') {
      if (columnIndex === 5) { //Assumes column 5 is a date
        const dateA = new Date(aValue);
        const dateB = new Date(bValue);
        return dateA - dateB;
      } else {
        return aValue.localeCompare(bValue);
      }
    } else {
      if (columnIndex === 5) { 
        const dateA = new Date(aValue);
        const dateB = new Date(bValue);
        return dateB - dateA;
      } else {
        return bValue.localeCompare(aValue);
      }
    }
  });

  // Replace the rows in the current page with the sorted rows
  currentPageRows.forEach((row) => {
    tbody.removeChild(row);
  });

  currentPageRows.forEach((row) => {
    tbody.appendChild(row);
  });
}

// Resetting sort icons to default
function resetSortIcons(clickedLink) {
    headerLinks.forEach((link) => {
        if (link !== clickedLink) {
            link.setAttribute('data-sort-order', 'asc');
            const sortIcon = link.querySelector('.sort-icon');
            sortIcon.classList.remove('fa-sort-up');
            sortIcon.classList.remove('fa-sort-down');
            sortIcon.classList.add('fa-sort-down');
        }
    });
}

// Counting how many entries are currently in the table
function countEntries() {
  const table = document.querySelector('.main-table');
  const rows = table.querySelectorAll('tbody tr');
  return rows.length;
}

// Updating the count of visible entries
function updateEntriesCount() {
  const table = document.querySelector('.main-table');
  const rows = table.querySelectorAll('tbody tr');
  
  let visibleRowCount = 0;

  // Counting the number of rows with display not set to 'none'
  rows.forEach((row) => {
    if (row.style.display !== 'none') {
      visibleRowCount++;
    }
  });

  const maxRowsPerPage = 10;
  const currentPage = 1;
  const startIndex = (currentPage - 1) * maxRowsPerPage + 1;
  const endIndex = Math.min(currentPage * maxRowsPerPage, visibleRowCount);

  // Updating the count text
  const countText = `${startIndex} - ${endIndex} of ${visibleRowCount} entries`;
  const countTextElement = document.getElementById('countText');
  if (countTextElement) {
    countTextElement.textContent = countText;
  }
}

let currentPage = 1;
const maxRowsPerPage = 10;
let filteredRows = []; 

// Initialize the filteredRows array with all rows in the table
function initializeFilteredRows() {
  // Find the table element with the class 'main-table'
  const table = document.querySelector('.main-table');
  
  // Create an array containing all rows in the table
  filteredRows = Array.from(table.querySelectorAll('tbody tr'));
}

// Call the initialization function
initializeFilteredRows();

// Function to filter the table rows based on a search input
function SearchTable() {
  // Get the user's search input
  const searchInput = document.getElementById('search-input');
  const filter = searchInput.value.trim().toUpperCase();
  
  // Find the table and its rows
  const table = document.querySelector('.main-table');
  const rows = table.querySelectorAll('tbody tr');
  filteredRows = [];

  // Iterate through each row and check if it matches the search filter
  rows.forEach((row) => {
    const cells = row.getElementsByTagName('td');
    let rowText = '';

    // Create a single string containing all the text in the row
    for (let i = 0; i < cells.length; i++) {
      rowText += cells[i].textContent.toUpperCase() + ' ';
    }

    // Check if the row's text includes the filter text or if the filter is empty
    if (rowText.includes(filter) || filter === '') {
      row.style.display = ''; // Show the row
      filteredRows.push(row); // Add the row to the filteredRows array
    } else {
      row.style.display = 'none'; // Hide the row
    }
  });

  // Calculate the total number of pages based on filtered rows
  const totalPages = Math.ceil(filteredRows.length / maxRowsPerPage);
  const pageInfo = document.getElementById('page-info');
  const prevPageButton = document.getElementById('prev-page');
  const nextPageButton = document.getElementById('next-page');

  // Update the user interface based on the number of filtered rows
  if (pageInfo && prevPageButton && nextPageButton) {
    if (filteredRows.length === 0) {
      pageInfo.textContent = 'No entries found';
      prevPageButton.style.display = 'none';
      nextPageButton.style.display = 'none';
    } else {
      currentPage = 1;
      pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
      prevPageButton.style.display = totalPages > 1 ? '' : 'none';
      nextPageButton.style.display = totalPages > 1 ? '' : 'none';
    }
  }

  // Update the count of visible entries
  updateEntriesCount();
}

// Get the search input and add a submit event listener
const searchForm = document.getElementById('search-form');
searchForm.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission
    SearchTable(); // Call the search function
});

// Find the previous and next page buttons
const prevPageButton = document.getElementById('prev-page');
const nextPageButton = document.getElementById('next-page');

// Click event listeners to the pagination buttons
if (prevPageButton) {
  prevPageButton.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      updatePagination(); // Update the pagination UI
    }
  });
}

if (nextPageButton) {
  nextPageButton.addEventListener('click', () => {
    const table = document.querySelector('.main-table');
    const rows = table.querySelectorAll('tbody tr');
    const maxRowsPerPage = 10;
    const totalPages = Math.ceil(rows.length / maxRowsPerPage);

    if (currentPage < totalPages) {
      currentPage++;
      updatePagination(); // Update the pagination UI
    }
  });
}

// Initial call to update pagination
updatePagination();

// Function to update the pagination user interface based on filtered rows
function updatePagination() {
  if (filteredRows.length === 0) {
    // Handle case when no entries are found
    const pageInfo = document.getElementById('page-info');
    const prevPageButton = document.getElementById('prev-page');
    const nextPageButton = document.getElementById('next-page');
    const countTextElement = document.getElementById('countText');

    if (pageInfo && prevPageButton && nextPageButton && countTextElement) {
      pageInfo.textContent = 'No entries found';
      prevPageButton.style.display = 'none';
      nextPageButton.style.display = 'none';
      countTextElement.textContent = '0 entries';
    }

    return;
  }

  const startIndex = (currentPage - 1) * maxRowsPerPage;
  const endIndex = startIndex + maxRowsPerPage;
  const pageRows = filteredRows.slice(startIndex, endIndex);

  // Hide all rows and display only the current page's rows
  filteredRows.forEach((row) => {
    row.style.display = 'none';
  });

  pageRows.forEach((row) => {
    row.style.display = '';
  });

  // Update pagination information
  const entriesCount = filteredRows.length;
  const totalPages = Math.ceil(entriesCount / maxRowsPerPage);
  const pageInfo = document.getElementById('page-info');

  if (pageInfo) {
    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
  }

  // Find the previous and next page buttons
  const prevPageButton = document.getElementById('prev-page');
  const nextPageButton = document.getElementById('next-page');

  // Enable or disable pagination buttons based on the current page
  if (prevPageButton) {
    prevPageButton.disabled = currentPage === 1;
  }

  if (nextPageButton) {
    nextPageButton.disabled = currentPage === totalPages;
  }

  // Update the count of visible entries
  const countTextElement = document.getElementById('countText');
  if (countTextElement) {
    countTextElement.textContent = `${startIndex + 1} - ${Math.min(endIndex, entriesCount)} of ${entriesCount} entries`;
  }

  if (totalPages <= 1) {
    prevPageButton.style.display = 'none';
    nextPageButton.style.display = 'none';
  } else {
    prevPageButton.style.display = '';
    nextPageButton.style.display = '';
  }
}

const filtersButton = document.querySelector('.filters-button');
const dropdownMenu = document.querySelector('.dropdown-menu');

// Show the dropdown
filtersButton.addEventListener('click', (event) => {
  dropdownMenu.classList.toggle('show');
  event.stopPropagation();
});

// Global event listener to close the dropdown when clicking outside
document.addEventListener('click', function (event) {
  if (!event.target.closest('.dropdown-menu')) {
    dropdownMenu.classList.remove('show');
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const dropdownItems = document.querySelectorAll('.dropdown-item');

  dropdownItems.forEach(item => {
      item.addEventListener('click', function(event) {
          event.stopPropagation();

          const filterType = item.getAttribute('data-filter-type');
          // Perform filtering based on filterType
          console.log(`Filter selected: ${filterType}`);
      });
  });
});

// Function to filter the table rows based on a filter input
function FilterTable(filterType, filterValue) {
  // Find the table and its rows
  const table = document.querySelector('.main-table');
  const rows = table.querySelectorAll('tbody tr');
  filteredRows = [];

  console.log(`Filtering by type ${filterType}, value: ${filterValue}`);
  
  // Iterate through each row and check if it matches the filter criteria
  rows.forEach((row) => {
    const cells = row.getElementsByTagName('td');
    const filterCell = cells[filterType - 1]; // Assuming filterType is 1-based

    // Check if the filter cell's text matches the filter value
    if (filterCell) {
      const cellText = filterCell.textContent.toLowerCase();
      console.log(`Row text: ${cellText}`);
      if (cellText.includes(filterValue) || filterValue === 'all') {
        row.style.display = ''; // Show the row
        filteredRows.push(row); // Add the row to the filteredRows array
      } else {
        row.style.display = 'none'; // Hide the row
      }
    }
  });

  // Calculate the total number of pages based on filtered rows
  const totalPages = Math.ceil(filteredRows.length / maxRowsPerPage);
  const pageInfo = document.getElementById('page-info');
  const prevPageButton = document.getElementById('prev-page');
  const nextPageButton = document.getElementById('next-page');

  // Update the user interface based on the number of filtered rows
  if (pageInfo && prevPageButton && nextPageButton) {
    if (filteredRows.length === 0) {
      pageInfo.textContent = 'No entries found';
      prevPageButton.style.display = 'none';
      nextPageButton.style.display = 'none';
    } else {
      currentPage = 1;
      pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
      prevPageButton.style.display = totalPages > 1 ? '' : 'none';
      nextPageButton.style.display = totalPages > 1 ? '' : 'none';
    }
  }

  // Update the count of visible entries
  updateEntriesCount();
}

// Function to reset all filters
function resetFilters() {
  // Store the current page
  const currentPageBeforeReset = currentPage;

  // Clear the search input
  const searchInput = document.getElementById('search-input');
  searchInput.value = '';

  // Reset the status filter to "All"
  const statusFilter = document.querySelector('.dropdown-item[data-filter-type="status"]');
  statusFilter.classList.remove('active');

  // Reset the "Active" and "Inactive" filter buttons
  const activeStatusFilter = document.querySelector('.dropdown-item[data-filter-type="status-active"]');
  const inactiveStatusFilter = document.querySelector('.dropdown-item[data-filter-type="status-inactive"]');
  activeStatusFilter.classList.remove('active');
  inactiveStatusFilter.classList.remove('active');

  // Reset the filteredRows to include all rows
  initializeFilteredRows();

  // Set the current page back to what it was before resetting
  currentPage = currentPageBeforeReset;

  // Update pagination
  updatePagination();
  
  // Update the filtered table data with "All" status
  generateFilteredTableData(data, tbody, "All");
}

// Event listener for the "Reset" filter item
const resetFilterItem = document.querySelector('.dropdown-item[data-filter-type="reset"]');
resetFilterItem.addEventListener('click', function(event) {
  event.stopPropagation();
  resetFilters(); // Call the resetFilters function when "Reset" is clicked
});

//For Filtering Table by Gender
document.addEventListener('DOMContentLoaded', function () {
  // Get the filter buttons
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="gender-"]');

  // Click event listeners for the filter buttons
  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Extract the gender from the data-filter-type attribute
      const gender = button.getAttribute('data-filter-type').replace('gender-', '');
      const filterType = 4; // Assuming the "Gender" is in the fourth column

      FilterTable(filterType, gender);

      // Update entries count and pagination
      updateEntriesCount();
      updatePagination();
    });
  });

  // Initial filtering when the page loads
  FilterTable(4, 'all');
});

//For Filtering Table by Birthday
document.addEventListener('DOMContentLoaded', function () {
  // Get the filter buttons and table rows
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="birthday-"]');

  // Click event listeners to the filter buttons
  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Extract the Birthday from the data-filter-type attribute
      const birthdayFilter = button.getAttribute('data-filter-type').replace('birthday-', '');

      FilterTable(3, birthdayFilter);

      // Update entries count and pagination
      updateEntriesCount();
      updatePagination();
    });
  });
  FilterTable(3, 'all');
});

//Filter by Status
document.addEventListener('DOMContentLoaded', function () {
  // Get the filter buttons and table rows
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="status-"]');
  const rows = document.querySelectorAll('#table-data tr');

  // Click event listeners to the filter buttons
  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Extract the status from the data-filter-type attribute
      const status = button.getAttribute('data-filter-type').replace('status-', '');

      // Filter the rows based on the selected status
      filterRowsByStatus(status);
      updateEntriesCount();
    });
  });

  // Function to filter the rows based on status
  function filterRowsByStatus(selectedStatus) {
    rows.forEach(row => {
      const statusContainer = row.querySelector('.status-container');
      if (statusContainer) {
        const rowStatus = statusContainer.textContent.toLowerCase();

        if (selectedStatus === 'all' || rowStatus === selectedStatus) {
          row.style.display = ''; // Show the row
        } else {
          row.style.display = 'none'; // Hide other rows
        }
      }
    });
  }
  updatePagination();
});

// Function to filter the data based on gender
function filterDataByGender(data, gender) {
  return data.filter(item => {
    if (gender === 'All Genders') {
      return true; // Return all items
    } else {
      // Normalize gender values for case-insensitive comparison
      return item.gender.toLowerCase() === gender.toLowerCase();
    }
  });
}

// Event listener for gender filter options
document.addEventListener('DOMContentLoaded', function () {
  const genderDropdownItems = document.querySelectorAll('.dropdown-item[data-filter-type^="gender-"]');

  genderDropdownItems.forEach(item => {
      item.addEventListener('click', function (event) {
          event.stopPropagation();

          // Get the filter type
          const filterType = item.getAttribute('data-filter-type');

          // Extract the gender filter value
          const selectedGender = filterType.replace('gender-', '');

          // Log the selected gender
          console.log(`Selected gender: ${selectedGender}`);

          // Update the filtered table data based on the selected gender
          generateFilteredTableDataByGender(data, tbody, selectedGender);
      });
  });
});

function generateFilteredTableDataByGender(data, element, gender) {
  // Filter the data based on the selected gender
  const filteredData = filterDataByGender(data, gender);

  console.log('Filtered Data by Gender:', filteredData);

  // Clear the existing table data
  element.innerHTML = "";

  // Iterate over the filtered data and create table rows
  for (const row of filteredData) {
    const tr = document.createElement("tr");

    // Create a table data cell for each column in the row
    for (const [key, value] of Object.entries(row)) {
      const td = document.createElement("td");
      td.innerHTML = value;
      tr.append(td);
    }

    // Append the row to the table
    element.appendChild(tr);
  }

  // After filtering, update the filteredRows list
  filteredRows = Array.from(element.querySelectorAll('tr'));

  // Update pagination
  updatePagination();
}

function filterDataByMonth(data, month) {
  return data.filter(item => {
    // Assuming that your data has a "birthday" property in the format "Month Day, Year"
    const birthdayMonth = item.birthday.split(' ')[0];

    if (month === 'All Months') {
      return true; // Return all items
    } else {
      return birthdayMonth.toLowerCase() === month.toLowerCase();
    }
  });
}

// Event listener for birthday filter options
document.addEventListener('DOMContentLoaded', function () {
  const birthdayDropdownItems = document.querySelectorAll('.dropdown-item[data-filter-type^="birthday-"]');

  birthdayDropdownItems.forEach(item => {
    item.addEventListener('click', function (event) {
      event.stopPropagation();

      // Get the filter type
      const filterType = item.getAttribute('data-filter-type');

      // Extract the month filter value
      const selectedMonth = filterType.replace('birthday-', '');

      // Log the selected month
      console.log(`Selected month: ${selectedMonth}`);

      // Update the filtered table data based on the selected month
      generateFilteredTableDataByMonth(data, tbody, selectedMonth);
    });
  });
});

function generateFilteredTableDataByMonth(data, element, month) {
  // Filter the data based on the selected month
  const filteredData = filterDataByMonth(data, month);

  console.log('Filtered Data by Month:', filteredData);

  // Clear the existing table data
  element.innerHTML = "";

  // Iterate over the filtered data and create table rows
  for (const row of filteredData) {
    const tr = document.createElement("tr");

    // Create a table data cell for each column in the row
    for (const [key, value] of Object.entries(row)) {
      const td = document.createElement("td");
      td.innerHTML = value;
      tr.append(td);
    }

    // Append the row to the table
    element.appendChild(tr);
  }

  // After filtering, update the filteredRows list
  filteredRows = Array.from(element.querySelectorAll('tr'));

  // Update pagination
  updatePagination();
}

//Show Kebab menu button 
function toggleDropdown(event) {
  const row = event.target.closest('tr');
  const dropdown = row.querySelector('.dropdown-menu-option');
  if (dropdown.style.display === 'flex') {
      dropdown.style.display = 'none';
  } else {
      dropdown.style.display = 'flex';
  }
}

//Event listeners to all dropdown buttons
const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
dropdownButtons.forEach(button => {
  button.addEventListener('click', toggleDropdown);
});

//Global event listener to close the dropdown when clicking outside
document.addEventListener('click', function (event) {
  if (!event.target.closest('.dropdown-option')) {
    const dropdowns = document.querySelectorAll('.dropdown-menu-option');
    dropdowns.forEach(dropdown => {
      dropdown.style.display = 'none';
    });
  }
});

//View Modal, Activate Modal, Deactivate Modal, Delete Modal
document.addEventListener('DOMContentLoaded', function () {
  // Query all elements
  const viewButtons = document.querySelectorAll('.view-button');
  const closeButtons = document.querySelectorAll('.cancel-employee-button');
  const deactivateButtons = document.querySelectorAll('.deactivate-button');
  const activateButtons = document.querySelectorAll('.activate-button');
  const deleteButtons = document.querySelectorAll('.delete-employee-button');
  const modalBackgrounds = document.querySelectorAll('.view-modal-container, .deactivate-modal-container, .activate-modal-container, .delete-modal-container');
  const closeDeactivateButtons = document.querySelectorAll('.cancel-deactivate-button');
  const closeActivateButtons = document.querySelectorAll('.cancel-activate-button');
  const closeDeleteButtons = document.querySelectorAll('.cancel-delete-button');
  const editButtons = document.querySelectorAll('.edit-employee-button');
  const closeEditButtons = document.querySelectorAll('.cancel-edit-button');

  // Function to toggle modal display
  function toggleModal(modalId, show) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = show ? 'flex' : 'none';
    }
  }

  // Handle view modals
  viewButtons.forEach(viewButton => {
    viewButton.addEventListener('click', function () {
      const employeeId = viewButton.getAttribute('data-employee-id');
      toggleModal('viewModal' + employeeId, true);
    });
  });

  closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', function () {
      const viewModal = closeButton.closest('.view-modal-container');
      if (viewModal) {
        toggleModal(viewModal.id, false);
      }
    });
  });

  // Handle deactivate modals
  deactivateButtons.forEach(deactivateButton => {
    deactivateButton.addEventListener('click', function (event) {
      event.preventDefault();
      const employeeId = deactivateButton.getAttribute('data-employee-id');
      toggleModal('deactivateEmployee' + employeeId, true);
    });
  });

  closeDeactivateButtons.forEach(closeDeactivateButton => {
    closeDeactivateButton.addEventListener('click', function () {
      const deactivateModal = closeDeactivateButton.closest('.deactivate-modal-container');
      if (deactivateModal) {
        toggleModal(deactivateModal.id, false);
      }
    });
  });

  // Handle activate modals
  activateButtons.forEach(activateButton => {
    activateButton.addEventListener('click', function (event) {
      event.preventDefault();
      const employeeId = activateButton.getAttribute('data-employee-id');
      toggleModal('activateEmployee' + employeeId, true);
    });
  });

  closeActivateButtons.forEach(closeActivateButton => {
    closeActivateButton.addEventListener('click', function () {
      const activateModal = closeActivateButton.closest('.activate-modal-container');
      if (activateModal) {
        toggleModal(activateModal.id, false);
      }
    });
  });

  // Handle delete modals
  deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener('click', function () {
      const employeeId = deleteButton.getAttribute('data-employee-id');
      console.log('Opening delete modal for employee ID: ' + employeeId); // Add this line
      toggleModal('deleteEmployee' + employeeId, true);
    });
  });

  closeDeleteButtons.forEach(closeDeleteButton => {
    closeDeleteButton.addEventListener('click', function () {
      const deleteModal = closeDeleteButton.closest('.delete-modal-container');
      if (deleteModal) {
        toggleModal(deleteModal.id, false);
      }
    });
  });

  // Handle edit modals
  editButtons.forEach(editButton => {
    editButton.addEventListener('click', function () {
      const employeeId = editButton.getAttribute('data-employee-id');
      toggleModal('editModal' + employeeId, true);
    });
  });

  closeEditButtons.forEach(closeEditButton => {
    closeEditButton.addEventListener('click', function () {
      const editModal = closeEditButton.closest('.edit-modal-container');
      if (editModal) {
        toggleModal(editModal.id, false);
      }
    });
  });

  // Handle modal backgrounds
  modalBackgrounds.forEach(modalBackground => {
    modalBackground.addEventListener('click', function (event) {
      if (event.target === modalBackground) {
        modalBackground.style.display = 'none';
      }
    });
  });
});

//Open Add Employee Modal
document.addEventListener('DOMContentLoaded', function () {
  // Get the "Add Employee" button, the modal element, and the "Cancel" button
  const addEmployeeButton = document.querySelector('.add-employee-button');
  const addModal = document.getElementById('add-modal');
  const cancelModalButton = document.getElementById('add-cancel-btn');

  // Add a click event listener to the "Add Employee" button to open the modal
  addEmployeeButton.addEventListener('click', function () {
    addModal.style.display = 'flex';
  });

  // Add a click event listener to the "Cancel" button to close the modal
  cancelModalButton.addEventListener('click', function () {
    addModal.style.display = 'none';
  });

  addModal.addEventListener('click', function (event) {
    if (event.target === addModal) {
      addModal.style.display = 'none';
    }
  });

});

window.onclick = function(event) {
  if (event.target == viewModal) {
      viewModal.style.display = "none";
  }
}

// Function to format SSS number
const sssNumberInput = document.getElementById('sss_number');

sssNumberInput.addEventListener('input', function () {
  const inputValue = sssNumberInput.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  let formattedValue = '';

  if (inputValue.length > 2) {
    formattedValue = inputValue.substring(0, 2) + '-';

    if (inputValue.length > 9) {
      formattedValue += inputValue.substring(2, 9) + '-';

      if (inputValue.length > 10) {
        formattedValue += inputValue.substring(9, 10);
      } else {
        formattedValue += inputValue.substring(9);
      }
    } else {
      formattedValue += inputValue.substring(2);
    }

    sssNumberInput.value = formattedValue;
  }
});

sssNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

const philhealthNumberInput = document.getElementById('philhealth_number');

philhealthNumberInput.addEventListener('input', function () {
  // Remove non-numeric characters
  let inputValue = philhealthNumberInput.value.replace(/[^0-9]/g, '');
  let formattedValue = '';

  if (inputValue.length >= 2) {
    formattedValue = inputValue.substring(0, 2);

    if (inputValue.length > 2) {
      formattedValue += '-' + inputValue.substring(2, 9);

      if (inputValue.length > 9) {
        formattedValue += '-' + inputValue.substring(9, 10);
      }
    }

    philhealthNumberInput.value = formattedValue;
  }
});

philhealthNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

// Function to format TIN
const tinNumberInput = document.getElementById('tin');

tinNumberInput.addEventListener('input', function () {
  const inputValue = tinNumberInput.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  let formattedValue = '';

  if (inputValue.length > 0) {
    formattedValue = inputValue.substring(0, 3);

    if (inputValue.length > 3) {
      formattedValue += '-' + inputValue.substring(3, 6);
    }

    if (inputValue.length > 6) {
      formattedValue += '-' + inputValue.substring(6, 9);
    }

    if (inputValue.length > 9) {
      formattedValue += '-' + inputValue.substring(9, 12);
    }

    tinNumberInput.value = formattedValue;
  }
});

tinNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

// Function to format Salary input
const salaryInput = document.getElementById('salary');

// Set the initial value to "0.00"
salaryInput.value = "0.00";

salaryInput.addEventListener('input', function () {
  let inputValue = salaryInput.value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters except '.'
  
  // Ensure there's a decimal point
  if (!inputValue.includes('.')) {
    inputValue += ".00";
  } else {
    // Limit decimal places to 2
    const parts = inputValue.split('.');
    if (parts[1] && parts[1].length > 2) {
      parts[1] = parts[1].substring(0, 2);
    }
    inputValue = parts.join('.');
  }
  
  salaryInput.value = inputValue;
});

// Function to format Contact number input
const contactInput = document.getElementById('contact');

contactInput.addEventListener('input', function () {
  let inputValue = contactInput.value.replace(/[^0-9+]/g, ''); // Remove non-numeric characters except '+'
  
  // Check if the input starts with "+63"
  if (!inputValue.startsWith('+63')) {
    inputValue = '+63' + inputValue;
  }
  
  contactInput.value = inputValue;
});

const eContactInput = document.getElementById('emergency_contact');

eContactInput.addEventListener('input', function () {
  let inputValue = eContactInput.value.replace(/[^0-9+]/g, ''); // Remove non-numeric characters except '+'
  
  // Check if the input starts with "+63"
  if (!inputValue.startsWith('+63')) {
    inputValue = '+63' + inputValue;
  }
  
  eContactInput.value = inputValue;
});

// --------Edit Form-------- //

// Function to format SSS number
const e_sssNumberInput = document.getElementById('e_sss_number');

e_sssNumberInput.addEventListener('input', function () {
  const inputValue = e_sssNumberInput.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  let formattedValue = '';

  if (inputValue.length > 2) {
    formattedValue = inputValue.substring(0, 2) + '-';

    if (inputValue.length > 9) {
      formattedValue += inputValue.substring(2, 9) + '-';

      if (inputValue.length > 10) {
        formattedValue += inputValue.substring(9, 10);
      } else {
        formattedValue += inputValue.substring(9);
      }
    } else {
      formattedValue += inputValue.substring(2);
    }

    e_sssNumberInput.value = formattedValue;
  }
});

e_sssNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

// Function to format Philhealth number
const e_philhealthNumberInput = document.getElementById('e_philhealth_number');

e_philhealthNumberInput.addEventListener('input', function () {
  const inputValue = e_philhealthNumberInput.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  let formattedValue = '';

  if (inputValue.length > 2) {
    formattedValue = inputValue.substring(0, 2) + '-';

    if (inputValue.length > 9) {
      formattedValue += inputValue.substring(2, 9) + '-';

      if (inputValue.length > 10) {
        formattedValue += inputValue.substring(9, 10);
      } else {
        formattedValue += inputValue.substring(9);
      }
    } else {
      formattedValue += inputValue.substring(2);
    }

    e_philhealthNumberInput.value = formattedValue;
  }
});

e_philhealthNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

// Function to format TIN
const e_tinNumberInput = document.getElementById('e_tin');

e_tinNumberInput.addEventListener('input', function () {
  const inputValue = e_tinNumberInput.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  let formattedValue = '';

  if (inputValue.length > 0) {
    formattedValue = inputValue.substring(0, 3);

    if (inputValue.length > 3) {
      formattedValue += '-' + inputValue.substring(3, 6);
    }

    if (inputValue.length > 6) {
      formattedValue += '-' + inputValue.substring(6, 9);
    }

    if (inputValue.length > 9) {
      formattedValue += '-' + inputValue.substring(9, 12);
    }

    e_tinNumberInput.value = formattedValue;
  }
});

e_tinNumberInput.addEventListener('keypress', function (e) {
  const key = String.fromCharCode(e.charCode);
  if (!/^\d$/.test(key)) {
    e.preventDefault(); // Prevent entering non-numeric characters
  }
});

// Function to format Salary input
const e_salary = document.getElementById('e_salary');

e_salary.addEventListener('input', function () {
  let inputValue = e_salary.value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters except '.'
  
  // Ensure there's a decimal point
  if (!inputValue.includes('.')) {
    inputValue += ".00";
  } else {
    // Limit decimal places to 2
    const parts = inputValue.split('.');
    if (parts[1] && parts[1].length > 2) {
      parts[1] = parts[1].substring(0, 2);
    }
    inputValue = parts.join('.');
  }
  
  e_salary.value = inputValue;
});

// Function to format Contact number input
const e_contactInput = document.getElementById('e_contact');

e_contactInput.addEventListener('input', function () {
  let inputValue = e_contactInput.value.replace(/[^0-9+]/g, ''); // Remove non-numeric characters except '+'
  
  // Check if the input starts with "+63"
  if (!inputValue.startsWith('+63')) {
    inputValue = '+63' + inputValue;
  }
  
  e_contactInput.value = inputValue;
});

// Function to format Emergency Contact number input
const e_eContactInput = document.getElementById('e_emergency_contact');

e_eContactInput.addEventListener('input', function () {
  let inputValue = e_eContactInput.value.replace(/[^0-9+]/g, ''); // Remove non-numeric characters except '+'
  
  // Check if the input starts with "+63"
  if (!inputValue.startsWith('+63')) {
    inputValue = '+63' + inputValue;
  }
  
  e_eContactInput.value = inputValue;
});
initializeFilteredRows();
updatePagination();
