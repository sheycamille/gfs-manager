@php
    $users=\Auth::user();
    // $profiles=asset(Storage::url('uploads/avatar/'));
    $defaultProfile=URL::TO('assets/images/user/');
    $profile=URL::TO('uploads/avatar/');
    $languages=\App\Models\Utility::languages();
   $lang = isset($users->lang)?$users->lang:'en';
    if ($lang == null) {
        $lang = 'en';
    }
    // $LangName = \App\Models\Language::languageData($lang);
    $LangName = cache()->remember('full_language_data_' . $lang, now()->addHours(24), function () use ($lang) {
    return \App\Models\Language::languageData($lang);
    });
    $setting = \App\Models\Utility::settings();

    $unseenCounter=App\Models\ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count();
@endphp

{{--<header class="dash-header  {{(isset($mode_setting['cust_theme_bg']) && $mode_setting['cust_theme_bg'] == 'on')?'transprent-bg':''}}">--}}

@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
        @else
            <header class="dash-header">
                @endif

    <div class="header-wrapper">
            <div class="me-auto dash-mob-drp">
                <div class="row align-items-center">
                    <div class="col-sm-2">
                        <a href="#" class="text-muted">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2H20" stroke="#737791" stroke-width="3" stroke-linecap="round"/>
                                <path d="M2 10H13" stroke="#737791" stroke-width="3" stroke-linecap="round"/>
                                <path d="M2 18H9" stroke="#737791" stroke-width="3" stroke-linecap="round"/>
                            </svg>    
                        </a>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group my-3">
                            <span class="input-group-prepend">
                                <button class="btn btn-outline-secondary bg-white border-start-0 border ms-n3" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            <input class="form-control border-end-0 border" type="text" placeholder="Search ..." id="example-search-input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="me-auto dash-mob-drp">
                <div class="list-unstyled header-clock py-o">
                    <li>
                        <svg class="clock" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>                          
                    </li>
                    <li class="">
                        <div class="mx-2">
                            <p class="text-sm p-0 m-0">
                                <span class="text">
                                    {{\Carbon\Carbon::now()->format('D,d M')}} {{\Carbon\Carbon::now()->format('H:i')}}
                                </span>
                            </p>
                            <p class=" p-0 m-0">
                                <span class="text">
                                    {{\Carbon\Carbon::now()->format('H:i')}}
                                </span>
                            </p>
                        </div>
                    </li>
                    <li class="px-3">
                        <a href="#" class="text-muted position-relative">
                            <i class="fa-regular fa-bell fa-2x text-dark"></i>  
                            <span class="position-absolute top--3 start-100 translate-middle badge rounded-pill bg-primary text-sm">
                              3+
                              <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                                              
                    </li>
                </div>
            </div>
            
            <div class="ms-auto header-right">
                <ul class="list-unstyled">
                    <li class=" d-flex align-items-center">
                        <a href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 13H4C3.73478 13 3.48043 13.1054 3.29289 13.2929C3.10536 13.4804 3 13.7348 3 14V20C3 20.2652 3.10536 20.5196 3.29289 20.7071C3.48043 20.8946 3.73478 21 4 21H10C10.2652 21 10.5196 20.8946 10.7071 20.7071C10.8946 20.5196 11 20.2652 11 20V14C11 13.7348 10.8946 13.4804 10.7071 13.2929C10.5196 13.1054 10.2652 13 10 13ZM9 19H5V15H9V19ZM20 3H14C13.7348 3 13.4804 3.10536 13.2929 3.29289C13.1054 3.48043 13 3.73478 13 4V10C13 10.2652 13.1054 10.5196 13.2929 10.7071C13.4804 10.8946 13.7348 11 14 11H20C20.2652 11 20.5196 10.8946 20.7071 10.7071C20.8946 10.5196 21 10.2652 21 10V4C21 3.73478 20.8946 3.48043 20.7071 3.29289C20.5196 3.10536 20.2652 3 20 3ZM19 9H15V5H19V9ZM20 16H18V14C18 13.7348 17.8946 13.4804 17.7071 13.2929C17.5196 13.1054 17.2652 13 17 13C16.7348 13 16.4804 13.1054 16.2929 13.2929C16.1054 13.4804 16 13.7348 16 14V16H14C13.7348 16 13.4804 16.1054 13.2929 16.2929C13.1054 16.4804 13 16.7348 13 17C13 17.2652 13.1054 17.5196 13.2929 17.7071C13.4804 17.8946 13.7348 18 14 18H16V20C16 20.2652 16.1054 20.5196 16.2929 20.7071C16.4804 20.8946 16.7348 21 17 21C17.2652 21 17.5196 20.8946 17.7071 20.7071C17.8946 20.5196 18 20.2652 18 20V18H20C20.2652 18 20.5196 17.8946 20.7071 17.7071C20.8946 17.5196 21 17.2652 21 17C21 16.7348 20.8946 16.4804 20.7071 16.2929C20.5196 16.1054 20.2652 16 20 16ZM10 3H4C3.73478 3 3.48043 3.10536 3.29289 3.29289C3.10536 3.48043 3 3.73478 3 4V10C3 10.2652 3.10536 10.5196 3.29289 10.7071C3.48043 10.8946 3.73478 11 4 11H10C10.2652 11 10.5196 10.8946 10.7071 10.7071C10.8946 10.5196 11 10.2652 11 10V4C11 3.73478 10.8946 3.48043 10.7071 3.29289C10.5196 3.10536 10.2652 3 10 3ZM9 9H5V5H9V9Z" fill="black"/>
                                <mask id="path-2-inside-1_2718_920" fill="white">
                                <rect x="13" y="13" width="8" height="8" rx="1"/>
                                </mask>
                                <rect x="13" y="13" width="8" height="8" rx="1" fill="white" stroke="black" stroke-width="4" mask="url(#path-2-inside-1_2718_920)"/>
                            </svg>
                        </a>
                    </li>
                    @if( \Auth::user()->type !='client' && \Auth::user()->type !='super admin' )
                            <li class="dropdown dash-h-item drp-notification">
                                <a class="dash-head-link arrow-none me-0" href="{{ url('chats') }}" aria-haspopup="false"
                                aria-expanded="false">
                                    <i class="ti ti-brand-hipchat"></i>
                                    <span class="bg-danger dash-h-badge message-toggle-msg  message-counter custom_messanger_counter beep"> {{ $unseenCounter }}<span
                                            class="sr-only"></span></span>
                                </a>

                            </li>
                        @endif

                        <li class="dropdown dash-h-item drp-language">
                        <a
                            class="dash-head-link dropdown-toggle arrow-none me-0"
                            data-bs-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="false"
                            aria-expanded="false"
                        >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2718_853)">
                                <path d="M12.0023 0.75C9.88355 0.751693 7.80838 1.35165 6.01562 2.4808H17.9725C16.1845 1.35461 14.1154 0.754774 12.0023 0.75Z" fill="#B22234"/>
                                <path d="M6.01221 2.48047C5.23993 2.96936 4.5301 3.55055 3.89844 4.21118H20.1125C19.4716 3.54864 18.7518 2.96738 17.9691 2.48047H6.01221Z" fill="white"/>
                                <path d="M3.9003 4.21094C3.38969 4.74179 2.93245 5.32151 2.53516 5.94174H21.4792C21.082 5.32152 20.6249 4.74181 20.1144 4.21094H3.9003Z" fill="#B22234"/>
                                <path d="M2.53326 5.94238C2.17818 6.49156 1.87166 7.07066 1.61719 7.6731H22.3722C22.1245 7.0714 21.8251 6.49232 21.4773 5.94238H2.53326Z" fill="white"/>
                                <path d="M1.61838 7.67285C1.38803 8.23396 1.20344 8.81278 1.06641 9.40366H22.9328C22.7933 8.81257 22.6063 8.23374 22.3734 7.67285H1.61838Z" fill="#B22234"/>
                                <path d="M1.06607 9.4043C0.930177 9.97325 0.838866 10.5519 0.792969 11.1351H23.213C23.1647 10.5517 23.0709 9.97305 22.9324 9.4043H1.06607Z" fill="white"/>
                                <path d="M0.793304 11.1348C0.767763 11.4226 0.753317 11.7112 0.75 12.0001C0.751095 12.2889 0.763311 12.5776 0.786621 12.8655H23.2067C23.2322 12.5777 23.2467 12.289 23.25 12.0001C23.2489 11.7113 23.2367 11.4226 23.2134 11.1348H0.793304Z" fill="#B22234"/>
                                <path d="M0.789062 12.8652C0.837428 13.4486 0.931249 14.0273 1.06967 14.596H22.936C23.0719 14.0271 23.1632 13.4484 23.2091 12.8652H0.789062Z" fill="white"/>
                                <path d="M1.06641 14.5957C1.20585 15.1868 1.39292 15.7656 1.62579 16.3265H22.3808C22.6111 15.7654 22.7957 15.1866 22.9328 14.5957H1.06641Z" fill="#B22234"/>
                                <path d="M1.625 16.3271C1.8727 16.9288 2.17213 17.5079 2.51993 18.0579H21.4639C21.819 17.5087 22.1255 16.9296 22.38 16.3271H1.625Z" fill="white"/>
                                <path d="M2.52344 18.0576C2.92061 18.6778 3.37773 19.2576 3.88821 19.7884H20.1023C20.6129 19.2576 21.0701 18.6779 21.4674 18.0576H2.52344Z" fill="#B22234"/>
                                <path d="M3.88672 19.7891C4.52759 20.4516 5.24747 21.0329 6.03015 21.5198H17.987C18.7593 21.0309 19.4691 20.4497 20.1008 19.7891H3.88672Z" fill="white"/>
                                <path d="M6.03125 21.5195C7.81928 22.6457 9.88836 23.2456 12.0015 23.2503C14.1202 23.2486 16.1954 22.6487 17.9881 21.5195H6.03125Z" fill="#B22234"/>
                                <path d="M12 0.75C9.01631 0.75 6.15483 1.93526 4.04505 4.04505C1.93526 6.15483 0.75 9.01631 0.75 12C0.751472 12.2973 0.764727 12.5944 0.789734 12.8906H12.8906V0.794586C12.5945 0.767959 12.2973 0.753086 12 0.75Z" fill="#3C3B6E"/>
                                <path d="M7.972 1.50847C7.82211 1.56319 7.67339 1.62109 7.52596 1.68214L7.6903 1.80702L7.57915 2.16618L7.87358 1.94636L8.17662 2.17671L8.06282 1.805L8.36586 1.57878H7.99352L7.972 1.50847ZM9.8803 1.20117L9.76341 1.57875H9.39235L9.69271 1.80704L9.58154 2.16616L9.87595 1.94635L10.179 2.17669L10.0652 1.80505L10.3682 1.57875H9.99593L9.8803 1.20117ZM11.8827 1.20117L11.7658 1.57875H11.3947L11.6951 1.80704L11.5839 2.16616L11.8783 1.94635L12.1814 2.17669L12.0676 1.80505L12.3706 1.57875H11.9983L11.8827 1.20117ZM5.07747 3.14726C5.02457 3.18671 4.97202 3.22663 4.91982 3.26701L5.17305 3.45955L5.07747 3.14726ZM6.87672 2.484L6.75983 2.86158H6.38878L6.68913 3.08987L6.57796 3.44899L6.87237 3.22918L7.17544 3.45952L7.06163 3.08788L7.36466 2.86158H6.99235L6.87672 2.484ZM8.8791 2.484L8.76222 2.86158H8.39116L8.69152 3.08987L8.58035 3.44899L8.87476 3.22918L9.17783 3.45952L9.06402 3.08788L9.36705 2.86158H8.99473L8.8791 2.484ZM10.8815 2.484L10.7646 2.86158H10.3935L10.6939 3.08987L10.5827 3.44899L10.8771 3.22918L11.1802 3.45952L11.0664 3.08788L11.3694 2.86158H10.9971L10.8815 2.484ZM3.97948 4.11415C3.86851 4.23161 3.76009 4.35145 3.65428 4.47358L3.57436 4.73176L3.86879 4.51194L4.17183 4.74229L4.05803 4.37068L4.36107 4.14436H3.98873L3.97948 4.11415ZM5.87553 3.76678L5.75863 4.14436H5.38758L5.68794 4.37265L5.57676 4.73176L5.87118 4.51196L6.17425 4.7423L6.06044 4.37066L6.36347 4.14436H5.99115L5.87553 3.76678ZM7.87791 3.76678L7.76102 4.14436H7.38997L7.69032 4.37265L7.57915 4.73176L7.87357 4.51196L8.17663 4.7423L8.06282 4.37066L8.36585 4.14436H7.99354L7.87791 3.76678ZM9.8803 3.76678L9.76341 4.14436H9.39235L9.69271 4.37265L9.58154 4.73176L9.87595 4.51196L10.179 4.7423L10.0652 4.37066L10.3682 4.14436H9.99593L9.8803 3.76678ZM11.8827 3.76678L11.7658 4.14436H11.3947L11.6951 4.37265L11.5839 4.73176L11.8783 4.51196L12.1814 4.7423L12.0676 4.37066L12.3706 4.14436H11.9983L11.8827 3.76678ZM2.95693 5.32704C2.85327 5.46518 2.75281 5.60569 2.65563 5.74846L2.57323 6.0146L2.86757 5.79478L3.1707 6.02513L3.0569 5.65352L3.35985 5.4272H2.9876L2.95693 5.32704ZM4.87433 5.04961L4.75744 5.42718H4.38639L4.68674 5.65548L4.57557 6.01459L4.86999 5.79479L5.17306 6.02513L5.05925 5.65348L5.36228 5.42718H4.98996L4.87433 5.04961ZM6.87672 5.04961L6.75983 5.42718H6.38878L6.68913 5.65548L6.57796 6.01459L6.87237 5.79479L7.17544 6.02513L7.06163 5.65348L7.36466 5.42718H6.99235L6.87672 5.04961ZM8.8791 5.04961L8.76222 5.42718H8.39116L8.69152 5.65548L8.58035 6.01459L8.87476 5.79479L9.17783 6.02513L9.06402 5.65348L9.36705 5.42718H8.99473L8.8791 5.04961ZM10.8815 5.04961L10.7646 5.42718H10.3935L10.6939 5.65548L10.5827 6.01459L10.8771 5.79479L11.1802 6.02513L11.0664 5.65348L11.3694 5.42718H10.9971L10.8815 5.04961ZM2.07949 6.71003C2.01225 6.83605 1.94742 6.96333 1.88503 7.09181L2.16948 7.30797L2.05568 6.93635L2.35872 6.71003H2.07949ZM3.87314 6.33244L3.75625 6.71001H3.3852L3.68556 6.93831L3.57438 7.29742L3.8688 7.07762L4.17186 7.30796L4.05806 6.93631L4.36109 6.71001H3.98877L3.87314 6.33244ZM5.87553 6.33244L5.75863 6.71001H5.38758L5.68794 6.93831L5.57676 7.29742L5.87118 7.07762L6.17425 7.30796L6.06044 6.93631L6.36347 6.71001H5.99115L5.87553 6.33244ZM7.87791 6.33244L7.76102 6.71001H7.38997L7.69032 6.93831L7.57915 7.29742L7.87357 7.07762L8.17663 7.30796L8.06282 6.93631L8.36585 6.71001H7.99354L7.87791 6.33244ZM9.8803 6.33244L9.76341 6.71001H9.39235L9.69271 6.93831L9.58154 7.29742L9.87595 7.07762L10.179 7.30796L10.0652 6.93631L10.3682 6.71001H9.99593L9.8803 6.33244ZM11.8827 6.33244L11.7658 6.71001H11.3947L11.6951 6.93831L11.5839 7.29742L11.8783 7.07762L12.1814 7.30796L12.0676 6.93631L12.3706 6.71001H11.9983L11.8827 6.33244ZM2.87195 7.61522L2.75506 7.99279H2.384L2.68436 8.22109L2.57319 8.5802L2.8676 8.3604L3.17067 8.59074L3.05687 8.21909L3.35989 7.99279H2.98757L2.87195 7.61522ZM4.87433 7.61522L4.75744 7.99279H4.38639L4.68674 8.22109L4.57557 8.5802L4.86999 8.3604L5.17306 8.59074L5.05925 8.21909L5.36228 7.99279H4.98996L4.87433 7.61522ZM6.87672 7.61522L6.75983 7.99279H6.38878L6.68913 8.22109L6.57796 8.5802L6.87237 8.3604L7.17544 8.59074L7.06163 8.21909L7.36466 7.99279H6.99235L6.87672 7.61522ZM8.8791 7.61522L8.76222 7.99279H8.39116L8.69152 8.22109L8.58035 8.5802L8.87476 8.3604L9.17783 8.59074L9.06402 8.21909L9.36705 7.99279H8.99473L8.8791 7.61522ZM10.8815 7.61522L10.7646 7.99279H10.3935L10.6939 8.22109L10.5827 8.5802L10.8771 8.3604L11.1802 8.59074L11.0664 8.21909L11.3694 7.99279H10.9971L10.8815 7.61522ZM1.87076 8.89804L1.75387 9.27562H1.38281L1.68317 9.50392L1.572 9.86303L1.86642 9.64322L2.16948 9.87357L2.05567 9.50192L2.3587 9.27562H1.98639L1.87076 8.89804ZM3.87314 8.89804L3.75625 9.27562H3.3852L3.68556 9.50392L3.57438 9.86303L3.8688 9.64322L4.17186 9.87357L4.05806 9.50192L4.36109 9.27562H3.98877L3.87314 8.89804ZM5.87553 8.89804L5.75863 9.27562H5.38758L5.68794 9.50392L5.57676 9.86303L5.87118 9.64322L6.17425 9.87357L6.06044 9.50192L6.36347 9.27562H5.99115L5.87553 8.89804ZM7.87791 8.89804L7.76102 9.27562H7.38997L7.69032 9.50392L7.57915 9.86303L7.87357 9.64322L8.17663 9.87357L8.06282 9.50192L8.36585 9.27562H7.99354L7.87791 8.89804ZM9.8803 8.89804L9.76341 9.27562H9.39235L9.69271 9.50392L9.58154 9.86303L9.87595 9.64322L10.179 9.87357L10.0652 9.50192L10.3682 9.27562H9.99593L9.8803 8.89804ZM11.8827 8.89804L11.7658 9.27562H11.3947L11.6951 9.50392L11.5839 9.86303L11.8783 9.64322L12.1814 9.87357L12.0676 9.50192L12.3706 9.27562H11.9983L11.8827 8.89804ZM2.87195 10.1809L2.75506 10.5584H2.384L2.68436 10.7867L2.57319 11.1459L2.8676 10.9261L3.17067 11.1564L3.05687 10.7847L3.35989 10.5584H2.98757L2.87195 10.1809ZM4.87433 10.1809L4.75744 10.5584H4.38639L4.68674 10.7867L4.57557 11.1459L4.86999 10.9261L5.17306 11.1564L5.05925 10.7847L5.36228 10.5584H4.98996L4.87433 10.1809ZM6.87672 10.1809L6.75983 10.5584H6.38878L6.68913 10.7867L6.57796 11.1459L6.87237 10.9261L7.17544 11.1564L7.06163 10.7847L7.36466 10.5584H6.99235L6.87672 10.1809ZM8.8791 10.1809L8.76222 10.5584H8.39116L8.69152 10.7867L8.58035 11.1459L8.87476 10.9261L9.17783 11.1564L9.06402 10.7847L9.36705 10.5584H8.99473L8.8791 10.1809ZM10.8815 10.1809L10.7646 10.5584H10.3935L10.6939 10.7867L10.5827 11.1459L10.8771 10.9261L11.1802 11.1564L11.0664 10.7847L11.3694 10.5584H10.9971L10.8815 10.1809ZM1.87076 11.4637L1.75387 11.8412H1.38281L1.68317 12.0695L1.572 12.4286L1.86642 12.2088L2.16948 12.4392L2.05567 12.0675L2.3587 11.8412H1.98639L1.87076 11.4637ZM3.87314 11.4637L3.75625 11.8412H3.3852L3.68556 12.0695L3.57438 12.4286L3.8688 12.2088L4.17186 12.4392L4.05806 12.0675L4.36109 11.8412H3.98877L3.87314 11.4637ZM5.87553 11.4637L5.75863 11.8412H5.38758L5.68794 12.0695L5.57676 12.4286L5.87118 12.2088L6.17425 12.4392L6.06044 12.0675L6.36347 11.8412H5.99115L5.87553 11.4637ZM7.87791 11.4637L7.76102 11.8412H7.38997L7.69032 12.0695L7.57915 12.4286L7.87357 12.2088L8.17663 12.4392L8.06282 12.0675L8.36585 11.8412H7.99354L7.87791 11.4637ZM9.8803 11.4637L9.76341 11.8412H9.39235L9.69271 12.0695L9.58154 12.4286L9.87595 12.2088L10.179 12.4392L10.0652 12.0675L10.3682 11.8412H9.99593L9.8803 11.4637ZM11.8827 11.4637L11.7658 11.8412H11.3947L11.6951 12.0695L11.5839 12.4286L11.8783 12.2088L12.1814 12.4392L12.0676 12.0675L12.3706 11.8412H11.9983L11.8827 11.4637Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_2718_853">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            
                            <span class="drp-text hide-mob">EN</span>
                            {{-- <span class="drp-text hide-mob">{{ucfirst($LangName->full_name)}}</span> --}}
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">

                            @foreach ($languages as $code => $language)
                                <a href="{{ route('change.language', $code) }}"
                                class="dropdown-item {{ $lang == $code ? 'text-primary' : '' }}">
                                    <span>{{ucFirst($language)}}</span>
                                </a>
                            @endforeach
                            <h></h>
                                @if(\Auth::user()->type=='company')
                                <a  data-url="{{ route('create.language') }}" class="dropdown-item text-primary"  data-ajax-popup="true" data-title="{{__('Create New Language')}}">
                                    {{ __('Create Language') }}
                                </a>
                                <a class="dropdown-item text-primary" href="{{route('manage.language',[isset($lang)?$lang:'english'])}}">{{ __('Manage Language') }}</a>
                                @endif
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled">
                    <li class="dash-h-item mob-hamburger">
                        <a href="#!" class="dash-head-link" id="mobile-collapse">
                            <div class="hamburger hamburger--arrowturn">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="dropdown dash-h-item drp-company">
                        <a
                            class="dash-head-link dropdown-toggle arrow-none me-0"
                            data-bs-toggle="dropdown"
                            href="#"
                            role="button"
                            aria-haspopup="false"
                            aria-expanded="false"
                        >
                            <span class="theme-avtar">
                                <img src="{{ !empty(\Auth::user()->avatar) ? $profile .'/'. \Auth::user()->avatar :  $defaultProfile.'/'.'avatar-1.jpg'}}" class="img-fluid rounded-circle">
                            </span>
                            <span class="hide-mob ms-2">{{__('Hi, ')}}{{\Auth::user()->name }} !</span>
                            <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown">

                            <!-- <a href="{{ route('change.mode') }}" class="dropdown-item">
                                <i class="ti ti-circle-plus"></i>
                                <span>{{(Auth::user()->mode == 'light') ? __('Dark Mode') : __('Light Mode')}}</span>
                            </a> -->

                            <a href="{{route('profile')}}" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <span>{{__('Profile')}}</span>
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">
                                <i class="ti ti-power"></i>
                                <span>{{__('Logout')}}</span>
                            </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>

                </ul>
        </div>
    </div>
</header>
