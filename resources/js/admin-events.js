document.addEventListener('DOMContentLoaded', () => {

    const rows = Array.from(document.querySelectorAll('.table_row'));
    const sortSelect = document.getElementById('sortSelect');
    const typeFilter = document.getElementById('typeFilter'); // ТОЛЬКО мероприятия

    if (!rows.length || !sortSelect) return;

    function applyFilters() {

        const sortValue = sortSelect.value;
        const typeValue = typeFilter ? typeFilter.value : 'all';


        rows.forEach(row => {
            row.style.display = '';
        });


        let filteredRows = rows.filter(row => {
            if (!typeFilter || typeValue === 'all') return true;

            return row.dataset.type === typeValue;
        });


        if (sortValue !== 'none') {
            filteredRows.sort((a, b) => {
                const aTitle = a.dataset.title || '';
                const bTitle = b.dataset.title || '';

                return sortValue === 'title_asc'
                    ? aTitle.localeCompare(bTitle, 'ru')
                    : bTitle.localeCompare(aTitle, 'ru');
            });
        }


        rows.forEach(row => row.style.display = 'none');


        const container = document.querySelector('.events_table');
        filteredRows.forEach(row => {
            row.style.display = '';
            container.appendChild(row);
        });
    }


    sortSelect.addEventListener('change', applyFilters);

    if (typeFilter) {
        typeFilter.addEventListener('change', applyFilters);
    }
});
