document.addEventListener('DOMContentLoaded', () => {
    const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь','Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];


//здесь получаем год, месяц и день из полученной даты
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    const currentDay = currentDate.getDay();

//здесь устанавливаем год и месяц в хеддер календаря
    let currentMonthHeader = document.getElementById('calendar_month');
    let currentYearHeader = document.getElementById('calendar_year');
    currentMonthHeader.innerText = months[currentMonth];
    currentYearHeader.innerText = currentYear;

//здесь две функции для предыдущих и следущих месяцев
    document.querySelector('.btn_header_before').addEventListener('click', function () {
        if(currentMonth > 0){
            currentMonth--;
        }
        else{
            currentMonth = 11;
            currentYear--;
        }

        currentMonthHeader.innerText = months[currentMonth];
        currentYearHeader.innerText = currentYear;
    });

    document.querySelector('.btn_header_after').addEventListener('click', function (){
        if(currentMonth < 11){
            currentMonth++;
        }
        else{
            currentMonth = 0;
            currentYear++;
        }

        currentMonthHeader.innerText = months[currentMonth];
        currentYearHeader.innerText = currentYear;
    });

    function formatDate(date) {
        const year = date.getFullYear();
        const month =String( date.getMonth() + 1).padStart(2, '0');//padStart добавляет 0 в начале если строка короче двух символов
        const day = String(date.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }

    const weekDays = ['Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье'];

    //здесь получаем понедельник текущей недели
    function getStartOfWeek(currentDate){
        const day = currentDate.getDay() || 7;//получаем номер дня недели текущего дня
        const monday = new Date(currentDate);//создаем новую дату, но пишем в скобках текущий день чтобы не перезаписать ориг дату
        monday.setDate(currentDate.getDate() - day + 1);// currentDate.getDate() - вовращает число месяца, day - номер дня недели
        return monday;
    }

    // здесь функция отрисовки недели
    function renderWeek(currentDate){
        const weekContainer = document.getElementById('calendar_days');
        const weekTitle = document.getElementById('calendar_current_week');

        weekContainer.innerHTML = ''; //очищаем перед заполнением

        const startWeek = getStartOfWeek(currentDate);
        const endWeek = new Date(startWeek);
        endWeek.setDate(startWeek.getDate() + 6);// 6 потому что отсчет начинается с 0


        const startDay = String(startWeek.getDate()).padStart(2, '0');
        const startMonth = String(startWeek.getMonth() + 1).padStart(2, '0');

        const endDay = String(endWeek.getDate()).padStart(2, '0');
        const endMonth = String(endWeek.getMonth() + 1).padStart(2, '0');

        weekTitle.innerHTML = `${startDay}.${startMonth} - ${endDay}.${endMonth}`;

        // const eventsContainer = document.getElementById('events_container');
        // eventsContainer.innerHTML = '';

        for (let i = 0; i < 7; i++){
            const day = new Date(startWeek);
            // почему вообще тут прибавляем - для сдвига даты(например 12 понедельник - 12 + 0 = 12 , ну и так далее)
            day.setDate(startWeek.getDate() + i);//почему нельзя просто присвоить i - потому что нужна дата, а i - число

            const line = document.createElement('div');
            line.classList.add('line_gray');

            const eventsContainer = document.createElement('div');
            eventsContainer.classList.add('events_container');

            const dayDiv = document.createElement('div');
            dayDiv.className = 'calendar_day';



            if (day.getMonth() !== currentMonth) {
                dayDiv.classList.add('other_month');
            }

            // dayDiv.innerHTML = `
            //                     <div>${day.getDate()}</div>
            //                     <div>${weekDays[i]}</div>`;

            const dateDiv = document.createElement('div');
            dateDiv.classList.add('calendar_date');
            dateDiv.textContent = day.getDate();

            const weekDayDiv = document.createElement('div');
            weekDayDiv.classList.add('calendar_weekday');
            weekDayDiv.textContent = weekDays[i];

            const eventDiv = document.createElement('div');
            eventDiv.classList.add('calendar_day_event');

            const today = new Date();
            if (
                day.getDate() === today.getDate() &&
                day.getMonth() === today.getMonth() &&
                day.getFullYear() === today.getFullYear()
            ) {
                dayDiv.classList.add('today');
            }

            dayDiv.appendChild(dateDiv);
            dayDiv.appendChild(weekDayDiv);

            const dayStr = formatDate(day);
            const dayEvents = events.filter(e => e.dateEvent === dayStr);

            // card.innerHTML = `
            //     <a href="/events/${e.id}">${e.title}</a>
            //     <div>${e.date}</div>
            // `;

            dayEvents.forEach(e=> {

                const card = document.createElement('div');
                card.classList.add('event_card');

                const titleDiv = document.createElement('div');
                titleDiv.classList.add('event_title');
                titleDiv.textContent = e.title;

                const timeDiv = document.createElement('div');
                timeDiv.classList.add('event_time');
                timeDiv.textContent = e.timeEvent.slice(0, 5); // 14:30

                const dateDiv = document.createElement('div');
                dateDiv.classList.add('event_date');
                dateDiv.textContent = e.dateEvent;

                const link = document.createElement('a');
                link.classList.add('btn_event_card');
                link.textContent = 'Подробнее';
                link.href = `/events/${e.id}`;


                card.appendChild(titleDiv);
                card.appendChild(dateDiv);
                card.appendChild(timeDiv);
                card.appendChild(link);


                eventDiv.appendChild(card);
                // eventsContainer.appendChild(card);
            });

            eventsContainer.appendChild(dayDiv);
            eventsContainer.appendChild(eventDiv);

            weekContainer.appendChild(line);
            weekContainer.appendChild(eventsContainer);
        }

    }

    //кнопки переключения недели
    document.querySelector('.btn_week_before').addEventListener('click', function (){
       const prevWeek = new Date(currentDate);
       prevWeek.setDate(currentDate.getDate() - 7);

       if(prevWeek.getMonth() === currentMonth) {
           currentDate = prevWeek;
           renderWeek(currentDate);
       }
    });

    document.querySelector('.btn_week_after').addEventListener('click', function (){
       const nextWeek = new Date(currentDate);
       nextWeek.setDate(currentDate.getDate() + 7);

       if(nextWeek.getMonth() === currentMonth){
           currentDate = nextWeek;
           renderWeek(currentDate);
       }
    });

    //Запуск функции, которая отвечает за текущую неделю
    renderWeek(currentDate);



// //здесь вычисляем сколько дней в месяце
//     let daysInMonth = new Date(currentYear, currentMonth+1, 0).getDate(); // 0 - это последний день предыдущего месяца, берем спец. текущей месяц и прибавляем 1 чтобы перейти на след. и потом уже getDate возвращает номер последнего дня
//
//
//     let week = document.createElement('div');
});


