// ! Sample Employee data
/*let data = [
  {
    id: "EMP-001",
    name: "Juan Dela Cruz",
    birthday: "January 01, 2000",
    gender: "Male",
    contact: "+638965654177",
    dateupdated: "May 14, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-002",
    name: "Kelly Tyrrell",
    birthday: "March 22, 1997",
    gender: "Female",
    contact: "+639129620477",
    dateupdated: "April 24, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-003",
    name: "Nerea Harlan",
    birthday: "May 27, 1999",
    gender: "Female",
    contact: "+638956149447",
    dateupdated: "March 04, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-004",
    name: "Izan Harding",
    birthday: "May 07, 1989",
    gender: "Male",
    contact: "+638954485255",
    dateupdated: "August 14, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-005",
    name: "Elma Merritt",
    birthday: "July 17, 2001",
    gender: "Others",
    contact: "+639172684346",
    dateupdated: "July 13, 2023",
    status: "<div class='status-container'><span class='status-inactive'>Inactive</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-006",
    name: "Aubrie Fay",
    birthday: "June 10, 2000",
    gender: "Female",
    contact: "+638974430260",
    dateupdated: "September 04, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-007",
    name: "Micky Henry",
    birthday: "August 17, 1999",
    gender: "Male",
    contact: "+639099598719",
    dateupdated: "August 14, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-008",
    name: "Christa Hernando",
    birthday: "April 13, 1987",
    gender: "Female",
    contact: "+638175281528",
    dateupdated: "July 19, 2023",
    status: "<div class='status-container'><span class='status-inactive'>Inactive</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-009",
    name: "Petrina Croft",
    birthday: "February 11, 1994",
    gender: "Others",
    contact: "+639602997327",
    dateupdated: "April 16, 2023",
    status: "<div class='status-container'><span class='status-inactive'>Inactive</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-010",
    name: "Generoso Starr",
    birthday: "December 23, 1996",
    gender: "Male",
    contact: "+638953519059",
    dateupdated: "August 04, 2023",
    status: "<div class='status-container'><span class='status-inactive'>Inactive</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
  {
    id: "EMP-006",
    name: "Aubrie Fay",
    birthday: "January 01, 2000",
    gender: "Male",
    contact: "December 01, 2023",
    dateupdated: "December 07, 2023",
    status: "<div class='status-container'><span class='status-active'>Active</span></div>",
    option: `<div class="dropdown-option">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu-option" id="myDropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item-option" href="#">View</a>
                    <a class="dropdown-item-option" href="#">Deactivate</a>
                </div>
            </div>`,
  },
];*/

/*function generateTableData(data, element) {
  const result = [];

  // Iterate over the data and create a table row for each row.
  for (const row of data) {
    const tr = document.createElement("tr");

    // Create a table data cell for each column in the row.
    for (const [key, value] of Object.entries(row)) {
      const td = document.createElement("td");
      td.innerHTML = value;
      tr.append(td);
    }

    // push to results
    result.push(tr);
  }

  // Append the table to the HTML element.
  element.append(...result);
}

// query for tbody tag
const tbody = document.querySelector("#table-data");

// pass the data and element then call the function
generateTableData(data, tbody);
*/


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

// Function to filter the data based on status
function filterDataByStatus(data, status) {
  return data.filter(item => {
      if (status === "All") {
          return true; // Return all items
      } else if (status === "Active") {
          return item.status.includes("status-active");
      } else if (status === "Inactive") {
          return item.status.includes("status-inactive");
      }
      return false; // Invalid status, return nothing
  });
}

// Event listener for status filter so you can select active and inactive
document.addEventListener('DOMContentLoaded', function() {
  const dropdownItems = document.querySelectorAll('.dropdown-item');

  dropdownItems.forEach(item => {
      item.addEventListener('click', function(event) {
          event.stopPropagation();

          // Get the filter type
          const filterType = item.getAttribute('data-filter-type');

          // Check if the filter type is "status-active" or "status-inactive"
          if (filterType === "status-active" || filterType === "status-inactive") {
              const status = filterType === "status-active" ? "Active" : "Inactive";
              
              // Update the filtered table data based on the selected status
              generateFilteredTableData(data, tbody, status);
          }
      });
  });
});

// Function to generate the filtered table data
function generateFilteredTableData(data, element, status) {
  // Filter the data based on the selected status
  const filteredData = filterDataByStatus(data, status);

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
function toggleDropdown() {
  var dropdown = document.getElementById("myDropdown");
  if (dropdown.style.display === "flex") {
      dropdown.style.display = "none";
  } else {
      dropdown.style.display = "flex";
  }
}

// Add a click event listener to the button
document.getElementById("dropdownMenuButton").addEventListener("click", toggleDropdown);

//Open View Modal
document.addEventListener('DOMContentLoaded', function () {
  const viewOption = document.querySelector('.dropdown-item-option[href="#"]');
  const cancelButton = document.querySelector('.cancel-employee-button');
  const editButton = document.querySelector('.edit-employee-button');
  const viewModal = document.getElementById('view-modal');
  const editModal = document.getElementById('edit-modal');

  // Function to show the modal
  function openViewModal() {
      viewModal.style.display = 'flex';
  }

  function openEditModal() {
    editModal.style.display = 'flex';
  }

  // Function to hide the modal
  function closeViewModal() {
      editModal.style.display = 'none';
  }

  // Add click event listeners
  viewOption.addEventListener('click', openViewModal);
  cancelButton.addEventListener('click', closeViewModal);
  editButton.addEventListener('click', openEditModal);

  window.onclick = function(event) {
    if (event.target == viewModal) {
        viewModal.style.display = "none";
    }
  }
});

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
});*/

initializeFilteredRows();
updatePagination();
