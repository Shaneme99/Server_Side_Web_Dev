document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const searchInput = document.getElementById('searchInput');
    const guestTable = document.getElementById('guestTable');
    const guests = [
      { firstName: "John", lastName: "Doe", roomNumber: "101", idNumber: "850123456" },
      { firstName: "Jane", lastName: "Smith", roomNumber: "102", idNumber: "850234567" },
      { firstName: "Alice", lastName: "Johnson", roomNumber: "103", idNumber: "850345678" }
      // Add more guests as needed
    ];
  
    // Function to render guest data in the table
    function renderGuests() {
      // Clear table body before re-rendering
      guestTable.getElementsByTagName('tbody')[0].innerHTML = '';
  
      guests.forEach(guest => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${guest.firstName}</td>
          <td>${guest.lastName}</td>
          <td>${guest.roomNumber}</td>
          <td>${guest.idNumber}</td>
          <td><button class="checkInOut">Check In</button></td>
        `;
        guestTable.getElementsByTagName('tbody')[0].appendChild(row);
      });
    }
  
    // Event listener for dark mode toggle
    darkModeToggle.addEventListener('change', function() {
      document.body.classList.toggle('dark-mode');
    });
  
    // Event listener for search input
    searchInput.addEventListener('input', renderGuests);
  
    // Initial rendering of guest data
    renderGuests();
  
    // Event delegation for check-in/out buttons
    guestTable.addEventListener('click', function(event) {
      if (event.target.classList.contains('checkInOut')) {
        const button = event.target;
        const row = button.parentElement.parentElement;
        const fullName = `${row.cells[0].textContent} ${row.cells[1].textContent}`;
        const status = button.textContent === 'Check In' ? 'Checked In' : 'Checked Out';
        button.textContent = status;
        // You can implement further functionality here, like updating database or displaying confirmation messages
      }
    });
  });
  