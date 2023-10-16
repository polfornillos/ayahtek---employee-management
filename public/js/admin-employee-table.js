// ! Sample Employee data
// Changing icons when sorting
const headerLinks = document.querySelectorAll('.header-link');
let currentSortedColumn = null;

// Adding click event listeners to header links for sorting
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

// Add click event listeners to the pagination buttons
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

//Show the dropdown
filtersButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

document.addEventListener('DOMContentLoaded', function() {
  const dropdownItems = document.querySelectorAll('.dropdown-item');

  dropdownItems.forEach(item => {
      item.addEventListener('click', function(event) {
          event.stopPropagation();

          // Your filter handling code here
          const filterType = item.getAttribute('data-filter-type');
          // Perform filtering based on filterType
          console.log(`Filter selected: ${filterType}`);
      });
  });
});

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
  // Get the filter buttons and table rows
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="gender-"]');
  const rows = document.querySelectorAll('#table-data tr');

  // Add click event listeners to the filter buttons
  filterButtons.forEach(button => {
      button.addEventListener('click', function () {
          // Extract the gender from the data-filter-type attribute
          const gender = button.getAttribute('data-filter-type').replace('gender-', '');

          // Filter the rows based on the selected gender
          filterRowsByGender(gender); 
          updateEntriesCount();
          
      });
  });

  // Function to filter the rows based on gender
  function filterRowsByGender(selectedGender) {
      rows.forEach(row => {
          const genderCell = row.querySelector('td:nth-child(4)');
          if (genderCell) {
              const rowGender = genderCell.textContent;

              if (selectedGender === 'all' || rowGender.toLowerCase() === selectedGender) {
                  row.style.display = ''; // Show the row
              } else {
                  row.style.display = 'none'; // Hide other rows
              }
          }

      });
  }
});

//For Filtering Table by Birthday
document.addEventListener('DOMContentLoaded', function () {
  // Get the filter buttons and table rows
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="birthday-"]');
  const rows = document.querySelectorAll('#table-data tr');

  // Add click event listeners to the filter buttons
  filterButtons.forEach(button => {
      button.addEventListener('click', function () {

          // Extract the Birthday from the data-filter-type attribute
          const birthdayFilter = button.getAttribute('data-filter-type').replace('birthday-', '');

          // Convert the month name to the numeric index
          const selectedMonth = monthNameToIndex(birthdayFilter);
          
          // Filter the rows based on the selected Birthday
          filterRowsByBirthday(selectedMonth); 
          updateEntriesCount();
      });
  });

  // Function to filter the rows based on the month of the birthday
  function filterRowsByBirthday(selectedMonth) {
    rows.forEach(row => {
      const birthdayCell = row.querySelector('td:nth-child(3)');
      if (birthdayCell) {
        const rowBirthday = new Date(birthdayCell.textContent);
        const rowMonth = rowBirthday.getMonth(); //Results to 0 for january, 1 for febuary so on and so forth

        console.log(rowMonth);
        if (selectedMonth === 'all' || rowMonth === selectedMonth) {
          row.style.display = ''; // Show the row
        } else {
          row.style.display = 'none'; // Hide other rows
        }
      }
    });
  }

  // Function to convert month name to the numeric index
  function monthNameToIndex(monthName) {
    const monthNames = [
      'january', 'february', 'march', 'april', 'may', 'june',
      'july', 'august', 'september', 'october', 'november', 'december'
    ];
    return monthNames.indexOf(monthName.toLowerCase());
  }
});

//Filter by Status
document.addEventListener('DOMContentLoaded', function () {
  // Get the filter buttons and table rows
  const filterButtons = document.querySelectorAll('.dropdown-item[data-filter-type^="status-"]');
  const rows = document.querySelectorAll('#table-data tr');

  // Add click event listeners to the filter buttons
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
//Function to toggle the dropdown menu for a specific row
function toggleDropdown(event) {
  const row = event.target.closest('tr');
  const dropdown = row.querySelector('.dropdown-menu-option');
  if (dropdown.style.display === 'flex') {
      dropdown.style.display = 'none';
  } else {
      dropdown.style.display = 'flex';
  }
}

// Add click event listeners to all dropdown buttons
const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
dropdownButtons.forEach(button => {
  button.addEventListener('click', toggleDropdown);
});

// Open View Modal
document.addEventListener('DOMContentLoaded', function () {
  const viewButtons = document.querySelectorAll('.view-button');
  const closeButtons = document.querySelectorAll('.cancel-employee-button');

  //Get the id of the specific row to be able to display the data of that specific row
  viewButtons.forEach(viewButton => {
    viewButton.addEventListener('click', function () {
      const employeeId = viewButton.getAttribute('data-employee-id');
      const viewModal = document.getElementById('viewModal' + employeeId);

      if (viewModal) {
        viewModal.style.display = 'flex';
      }
    });
  function openEditModal() {
     editModal.style.display = 'flex';
  }

  // Function to hide the modal
  function closeViewModal() {
      viewModal.style.display = 'none';
  }

  function closeEditModal() {
      editModal.style.display = 'none';
  }


  // Add click event listeners
  viewOption.addEventListener('click', openViewModal);
  cancelButton.addEventListener('click', closeViewModal);
  cancelEditButton.addEventListener('click', closeEditModal);
  editButton.addEventListener('click', openEditModal);
          if (viewModal) {
              viewModal.style.display = 'flex';
          }
      });
  });

  closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', function () {
      const viewModal = closeButton.closest('.view-modal-container');

      if (viewModal) {
        viewModal.style.display = 'none';
      }
    });
  });

  // Close the view modal when clicking the background
  viewButtons.forEach(viewButton => {
    const employeeId = viewButton.getAttribute('data-employee-id');
    const viewModal = document.getElementById('viewModal' + employeeId);

    if (viewModal) {
      viewModal.addEventListener('click', function (event) {
        if (event.target === viewModal) {
          viewModal.style.display = 'none';
        }
      });
    }
  });

//Open Add Employye Modal
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
/*
// Function to populate the HTML structure with data
function populateEmployeeDetails(employeeData, index) {
  const employeeContainers = document.querySelectorAll(".employee-details");

  if (index < employeeContainers.length) {
    // Assuming your data structure corresponds to the order of elements in the HTML
    const container = employeeContainers[index];
    container.querySelector(".employee-id").textContent = employeeData.id;
    container.querySelector(".employee-name").textContent = employeeData.name;
    container.querySelector(".employee-birthday").textContent = employeeData.birthday;
    container.querySelector(".employee-gender").textContent = employeeData.gender;
    container.querySelector(".employee-contact").textContent = employeeData.contact;
    // Add other fields in a similar manner
  }
}

// Iterate through the data and populate the HTML structure
data.forEach((employee, index) => {
  populateEmployeeDetails(employee, index);
});

initializeFilteredRows();
updatePagination();
