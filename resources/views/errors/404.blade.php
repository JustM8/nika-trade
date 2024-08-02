<!-- resources/views/errors/404.blade.php -->
@vite(['resources/sass/main.scss'])
<section class="page404">
                   
                    <div class="page404-intro">
                        <span class="page404__subtitle text-s">Упс..</span>
                        <img class="page404__img" src="{{asset('assets/images/404.png')}}" alt="">
                        <span class="page404__subtitle-bottom text-s">Щось пішло не так</span>
                        <div class="page404__link-wrap">
                            <button class="page404-btn-wrap btn" onclick="history.back()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9986 11H18.9986L8.36651 11L13.5249 5.6973L14.2222 4.98051L12.7886 3.58594L12.0913 4.30273L5.28183 11.3027L4.60352 12L5.28183 12.6973L12.0913 19.6973L12.7886 20.4141L14.2222 19.0195L13.5249 18.3027L8.36651 13H18.9986H19.9986V11Z" fill="white"/>
                                    </svg>
                                
                                <div class="button-text-wrap">
                                     <span class="text-button text-gray">Назад </span>
                                    </div>
                            </button>
                            <a class="page404-btn-wrap btn" href="">
                                
                                <div class="button-text-wrap"> 
                                    <span class="text-button text-gray">На головну</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
@push('footer-scripts')
    @vite([ 'resources/js/common.js', 'resources/js/news.js'])
@endpush
