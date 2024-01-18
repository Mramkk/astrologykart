@extends('web.layouts.master')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Cookie Policy</title>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="theme-color" content="#ff230b">
    <meta name="copyright" content="astrologykart.com">
    <meta property="og:site_name" content="Astrologykart">
    <meta property="og:type" content="website">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('main-content')
@include('web.includes.breadcrumb', ['page_title' => 'Cookie Policy'])
    <section class="">
        <div class="container">
            <div class="page-content pt-5">
                <h2>What Are Cookies?</h2>
                    <p>A cookie is a short text file that contains letters and numbers. Cookies carry information that is
                        saved on the hard drive of your computer or mobile device's browser.</p>

                    <h2>How Are Cookies Used?</h2>
                    <p>We use cookies to differentiate you from other users of our website and to offer you a personalized
                        browsing experience. Astrology Kart uses cookies to remember what you have done while exploring our
                        website, such as your log-in data, how far you have advanced with an order, what is in your shopping
                        basket, and so on.</p>

                    <h2>What Kinds Of Cookies Are Used?</h2>
                    <p>A session cookie is a temporary piece of data, while a persistent cookie is permanent. When you exit
                        your web browser, session cookies are removed from your computer. Persistent cookies will stay on
                        your computer until they are removed or reach their expiration date. Our website uses the following
                        cookies:</p>
                    <ul>
                        <li>Cookies for analysis/performance</li>
                        <p>These cookies enable us to identify and count the number of visitors as well as observe how
                            people navigate our website page during use. This allows us to enhance the performance of our
                            website, such as ensuring that people can conveniently discover what they are searching for.</p>
                        <li>Cookies with functionality</li>
                        <p>These cookies are used to recognize you when you visit our website again. This allows us to
                            customize our content for you, welcome you by name, remember your preferences, and provide live
                            chat help during your browsing experience.</p>
                        <li>Targeting cookies</li>
                        <p>These cookies track your visit to our website, including the pages you see and the links you
                            click. This information will be used to make our website and the advertising is shown on it more
                            relevant to your interests. Other parties may also be given access to this information for this
                            reason. These cookies enable you to share, like, and submit information to other websites to
                            personalize their ads.</p>
                    </ul>

                    <h2>What information do we collect when we use cookies?</h2>
                    <p>We may automatically collect important kinds of data from you when you visit our website: your IP
                        address, login information, time zone setting, operating system and platform, information about your
                        visits including the URL you came from, your country, the search terms you used in our website,
                        services you viewed or searched for, your preferred service, page response times, download errors,
                        length of visits to certain pages, page interaction information (such as scrolling, clicks, and
                        mouse-overs), and the methods used to navigate away from our website we may obtain this information
                        from you despite of whether you have purchased Astrology Kart.</p>
                    <h2>Your consent to use cookies and how do you block cookies?</h2>
                    <p>You agree to our privacy and cookies policy and consent to our usage of cookies by using the
                        Astrology Kart website on a computer or mobile device.</p>
                    <p>Most browsers, however, allow you to decline cookies. You can disable our cookies by enabling the
                        browser setting that allows you to prevent the setting of all or certain cookies. More information
                        about cookies, including how to remove and control them, may be found at www.aboutcookies.org or by
                        selecting help from your browser's menu.</p>
                    <p>Please keep in mind that if you disable our use of cookies, you may be unable to access some portions
                        of our website, and certain functionalities and pages may not perform properly. You will, for
                        example, be unable to access the shopping list function or purchase online.</p>
                    <h2>How can Astrology Kart influence cookie policy?</h2>
                    <p>This policy may be updated from time to time by Astrology Kart. The date at the top of this policy
                        will show the date of the issue. Changes in technology, regulation, and government guidelines may
                        necessitate us informing you of activities we do that affect your privacy rights. You should revisit
                        this page regularly to ensure you are up to date on any changes.</p>
                    <h2>Third-party access to personally identifiable data</h2>
                    <p> We share NPII with third parties solely to improve the quality and nature of the business transacted
                        as well as the overall user experience at Astrology Kart. Third parties may include service
                        providers, survey businesses, rating companies, and other organizations that are not directly
                        engaged in financial transactions conducted on this website.</p>
                    <h2>Legal undertaking</h2>
                    <p>Astrology Kart is forced to disclose personally identifiable information to comply with a court
                        order, summons, or request from a law enforcement body requiring us to do so. Geographic limits do
                        not apply to this type of legal compliance. Astrology Kart is also required to reveal this
                        information to safeguard your economic interests.</p>
                    <h2>Correction of outdated information about you</h2>
                    <p>You have the right not only to update your information but also to rectify any errors. To do so,
                        please use the website's Feedback Form to email us the old information as well as the new
                        information that you feel should replace it. You may have to re-enter bank information. It will
                        replace any existing records with us. Kindly allow for adequate time for such updates.</p>
            </div>
        </div>
    </section>
@endsection
