<h2 class="monthNowh2">В этом месяце</h2>

<div class="containerNowEvents">
    <span>Предстоящие события</span>

    <div class="now_events">
        <div class="Cards">
            @for ($i = 0; $i<3; $i++)

                <div class="container_card">
                    <div class="btnHeart">
                        <img class="ImgIconHeart" src="{{asset('storage/images/iconHeart.png')}}" alt="Icon2">
                    </div>
                    <div class="container_ImageCard">


                        <img src="{{asset('storage/images/Event1.png')}}" alt="Card1">
                    </div>
                    <div class="container_CardInfo">
                        <h3>Фестиваль ретро-
                            автомобилей</h3>

                        <div class="span_info">
                        <span>Понедельник 12 января - Четверг 15
января  </span>
                            <span>8:00 - 16:00</span>
                        </div>

                        <div class="btns_container">
                            <button class="btnMoreDetailed">Подробнее</button>
                            <div class="btnWebSait">
                                <span>Веб-сайт</span>
                                <img src="{{asset('storage/images/iconArrow.png')}}" alt="Icon1">
                            </div>
                        </div>

                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>

<div class="containerBeforeEvents">
    <span>Прошедшие события</span>


    <div class="before_events">
        <div class="Cards">
            @for ($i = 0; $i<3; $i++)

                <div class="container_card">
                    <div class="container_ImageCard">
                        {{--                        <img src="{{asset('storage/images/iconHeart.png')}}" alt="Icon2">--}}
                        <img src="{{asset('storage/images/Event1.png')}}" alt="Card1">
                    </div>
                    <div class="container_CardInfo">
                        <h3>Фестиваль ретро-
                            автомобилей</h3>

                        <div class="span_info">
                        <span>Понедельник 12 января - Четверг 15
января  </span>
                            <span>8:00 - 16:00</span>
                        </div>

                        <div class="btns_container">
                            <button class="btnMoreDetailed">Подробнее</button>
                            <div class="btnWebSait">
                                <span>Веб-сайт</span>
                                <img src="{{asset('storage/images/iconArrow.png')}}" alt="Icon1">
                            </div>
                        </div>

                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
