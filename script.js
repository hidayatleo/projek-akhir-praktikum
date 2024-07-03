document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#dataTable tbody tr');
    
    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;
        for (let i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().includes(searchValue)) {
                match = true;
                break;
            }
        }
        row.style.display = match ? '' : 'none';
    });
});

let current_page = 1;
let records_per_page = 5;

function prevPage() {
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage() {
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}

function changePage(page) {
    const btn_next = document.getElementById("btn_next");
    const btn_prev = document.getElementById("btn_prev");
    const table = document.getElementById("dataTable");
    const rows = table.getElementsByTagName("tr");

    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    for (let i = 1; i < rows.length; i++) {
        rows[i].style.display = "none";
    }

    for (let i = (page - 1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
        if (rows[i]) {
            rows[i].style.display = "";
        }
    }

    btn_prev.style.display = page === 1 ? "none" : "inline";
    btn_next.style.display = page === numPages() ? "none" : "inline";
}

function numPages() {
    const table = document.getElementById("dataTable");
    const rows = table.getElementsByTagName("tr");
    return Math.ceil((rows.length - 1) / records_per_page);
}

function confirmDelete(email) {
    const confirmation = confirm(`Are you sure you want to delete the entry for ${email}?`);
    if (confirmation) {
        window.location.href = 'process_delete.php?email=' + email;
    }
}

window.onload = function() {
    changePage(1);
};
function confirmDelete(email) {
    const confirmation = confirm(`Are you sure you want to delete the entry for ${email}?`);
    if (confirmation) {
        window.location.href = 'process/process_delete.php?email=' + email;
    }
}
