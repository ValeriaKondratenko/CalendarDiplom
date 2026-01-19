document.addEventListener('DOMContentLoaded', () => {

    let activeType = 'all';
    let activeSort = 'none';


    function normalizeDate(date) {
        return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }

    const months = [
        'Январь','Февраль','Март','Апрель',
        'Май','Июнь','Июль','Август',
        'Сентябрь','Октябрь','Ноябрь','Декабрь'
    ];

    const monthEl = document.getElementById('calendar_month');
    const yearEl  = document.getElementById('calendar_year');

    const today = normalizeDate(new Date());
    let activeMonth = today.getMonth();
    let activeYear  = today.getFullYear();

    function updateCalendarHeader(month, year) {
        monthEl.textContent = months[month];
        yearEl.textContent  = year;
    }

    const currentContainer = document.querySelector('.current_events .Cards');
    const futureContainer  = document.querySelector('.now_events .Cards');
    const pastContainer    = document.querySelector('.before_events .Cards');

    const currentEmpty = document.querySelector('.current_events .empty-message');
    const futureEmpty  = document.querySelector('.now_events .empty-message');
    const pastEmpty    = document.querySelector('.before_events .empty-message');

    const cards = document.querySelectorAll('#all-events .container_card');

    function renderEvents(month, year) {

        currentContainer.innerHTML = '';
        futureContainer.innerHTML  = '';
        pastContainer.innerHTML    = '';

        let filteredCards = [];

        cards.forEach(card => {
            const eventDate = normalizeDate(new Date(card.dataset.date));
            const cardMonth = Number(card.dataset.month);
            const cardYear  = Number(card.dataset.year);
            const cardType  = card.dataset.type;

            if (cardMonth !== month || cardYear !== year) return;
            if (activeType !== 'all' && cardType !== activeType) return;

            filteredCards.push({
                card,
                eventDate,
                title: card.querySelector('h3').textContent.trim()
            });
        });

        //сама сортировка
        if (activeSort === 'title_asc') {
            filteredCards.sort((a, b) =>
                a.title.localeCompare(b.title, 'ru')
            );
        }

        if (activeSort === 'title_desc') {
            filteredCards.sort((a, b) =>
                b.title.localeCompare(a.title, 'ru')
            );
        }

        // Вставка в контейнеры
        filteredCards.forEach(item => {
            if (item.eventDate.getTime() === today.getTime()) {
                currentContainer.appendChild(item.card);
            }
            else if (item.eventDate > today) {
                futureContainer.appendChild(item.card);
            }
            else {
                pastContainer.appendChild(item.card);
            }
        });

        checkEmpty(currentContainer, currentEmpty);
        checkEmpty(futureContainer, futureEmpty);
        checkEmpty(pastContainer, pastEmpty);
    }


    updateCalendarHeader(activeMonth, activeYear);
    renderEvents(activeMonth, activeYear);

    const sortSelect = document.getElementById('sortSelect');

    sortSelect.addEventListener('change', () => {
        activeSort = sortSelect.value;
        renderEvents(activeMonth, activeYear);
    });

    const typeFilter = document.getElementById('typeFilter');

    typeFilter.addEventListener('change', () => {
        activeType = typeFilter.value;
        renderEvents(activeMonth, activeYear);
    });

    document.getElementById('prevMonth').addEventListener('click', () => {
        activeMonth--;
        if (activeMonth < 0) {
            activeMonth = 11;
            activeYear--;
        }
        updateCalendarHeader(activeMonth, activeYear);
        renderEvents(activeMonth, activeYear);
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        activeMonth++;
        if (activeMonth > 11) {
            activeMonth = 0;
            activeYear++;
        }
        updateCalendarHeader(activeMonth, activeYear);
        renderEvents(activeMonth, activeYear);
    });

    //код для поиска
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLowerCase();

        searchResults.innerHTML = '';
        searchResults.hidden = true;

        if (query.length === 0) {
            renderEvents(activeMonth, activeYear);
            return;
        }

        let matches = [];

        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();

            if (title.includes(query)) {
                const link = card.querySelector('.btnMoreDetailed').href;

                matches.push({
                    title,
                    link
                });
            }
        });

        if (matches.length === 0) {
            searchResults.hidden = false;
            searchResults.innerHTML = `
            <div class="container_message_search">
                Ничего не найдено
            </div>
        `;
            return;
        }

        searchResults.hidden = false;

        matches.forEach(item => {
            const result = document.createElement('div');
            result.className = 'search-item';
            result.textContent = item.title;

            result.addEventListener('click', () => {
                window.location.href = item.link;
            });

            searchResults.appendChild(result);
        });

        // очистка календаря для поиска
        currentContainer.innerHTML = '';
        futureContainer.innerHTML = '';
        pastContainer.innerHTML = '';
    });


    const message = document.getElementById('flash-message');

    if (message) {
        setTimeout(() => {
            message.classList.add('hide');

            // полностью убрать из DOM
            setTimeout(() => {
                message.remove();
            }, 500);
        }, 3000);
    }

});

function checkEmpty(container, message) {
    message.hidden = container.children.length !== 0;
}
