<h2 class="monthNowh2">В этом месяце</h2>

<div class="containerCurrentEvents">
    <span>В этот день</span>
    <div class="current_events">
        <div class="container_message empty-message" hidden>
            <p >
                На сегодняшний день мероприятий не запланировано.
            </p>
        </div>
        <div class="Cards"></div>
    </div>
</div>

<div class="containerNowEvents">
    <span>Предстоящие события</span>
    <div class="now_events">
        <div class="container_message empty-message" hidden>
            <p >
                В этом месяце предстоящих мероприятий нет.
            </p>
        </div>
        <div class="Cards"></div>
    </div>
</div>

<div class="containerBeforeEvents">
    <span>Прошедшие события</span>
    <div class="before_events">
        <div class="container_message empty-message" hidden>
            <p>
                Прошедших мероприятий в этом месяце нет.
            </p>
        </div>
        <div class="Cards"></div>
    </div>
</div>



{{--скрытый код, который будет покащзываться в зависимости от дат карточек--}}
<div id="all-events" style="display: none;">
    @foreach($events as $event)
        <div class="container_card"
             data-date="{{ $event->dateEvent->toDateString() }}"
             data-month="{{ $event->dateEvent->month - 1 }}"
             data-year="{{ $event->dateEvent->year }}"
             data-type="{{ $event->id_event_type }}">
            <div class="btnHeart">
                <form method="POST" action="{{ route('favorites.add', $event->id) }}">
                    @csrf
                    <button type="submit" class="heartBtn"><img class="ImgIconHeart" src="{{asset('storage/images/iconHeart.png')}}" alt="Icon2"></button>
                </form>

            </div>
            <div class="container_ImageCard">
                <img src="{{ $event->getCover() }}" alt="{{ $event->title }}">
            </div>

            <div class="container_CardInfo">
                <h3>{{ $event->title }}</h3>

                <div class="span_info">
                    <span>{{ $event->dateEvent->locale('ru')->translatedFormat('l d F') }}</span>
                    <span>{{ $event->timeEvent }} – {{ $event->endEvent }}</span>
                </div>

                <div class="btns_container">
                    <a href="{{ route('event.show', $event->id) }}" class="btnMoreDetailed">
                        Подробнее
                    </a>
                    <div class="btnWebSait">
                        <span>Веб-сайт</span>
                        <img src="{{asset('storage/images/iconArrow.png')}}" alt="Icon1">
                    </div>
                </div>
            </div>

        </div>
    @endforeach
</div>
