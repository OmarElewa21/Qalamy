@if (!request()->is('student/*'))
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-widget header-widget1">
                        <ul class="contact-info d-flex align-items-center">
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="languagelink"
                                           data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false"><span class="live-icon">
                                                {{Str::ucfirst(\Illuminate\Support\Facades\Session::get('locale') ?? env('DEFAULT_LANGUAGE'))}}
                                            </span><span class="feather icon-chevron-down live-icon"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                            @foreach(\App\Model\Language::all() as $language)
                                                <a class="dropdown-item" href="{{route('frontend.languages.change')}}"
                                                   onclick="event.preventDefault();
                                                       document.getElementById('{{$language->name}}').submit()">
                                                    <img width="25" height="auto"
                                                         src="{{ asset("uploads/lang/". $language->image) }}" alt=""/>
                                                    {{$language->name}}</a>
                                                <form id="{{$language->name}}" class="d-none"
                                                      action="{{ route('frontend.languages.change') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="code" value="{{$language->code}}">
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="tel:{{getSystemSetting('type_number')->value}}"><span class="la la-phone"></span>  {{getSystemSetting('type_number')->value}}</a>
                            </li>
                            <li><a href="mailto:{{getSystemSetting('type_mail')->value}}"
                                   class="mail"> <span class="la la-envelope-o"></span> {{getSystemSetting('type_mail')->value}}</a></li>
                            @if (env('FORUM_PANEL') === 'YES')
                            <li><a href="{{ route('forum.index') }}" target="_blank"> <i class="fa fa-comments-o" aria-hidden="true"></i> Forum</a></li>
                            @endif

                        </ul>
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="header-widget header-widget2 d-flex align-items-center justify-content-end">
                        <div class="header-right-info">
                            <ul class="social-profile d-flex align-items-center social-margin">
                                @if(getSystemSetting('type_fb')->value != null)
                                    <li><a href="{{getSystemSetting('type_fb')->value}}" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                @endif

                                @if(getSystemSetting('type_tw')->value != null)
                                    <li><a href="{{getSystemSetting('type_tw')->value}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                @endif

                                @if(getSystemSetting('type_google')->value != null)
                                    <li><a href="{{getSystemSetting('type_google')->value}}" target="_blank"><i
                                                class="fa fa-google-plus"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="header-right-info d-flex align-items-center">
                            @guest()
                                <ul class="user-action d-flex align-items-center mr-10">
                                    <li><a href="{{ route('login') }}">@translate(Login)</a></li>
                                </ul>
                            @endguest
                        </div>
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top -->
@endif
