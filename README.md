![Konnect](/resources/images/logo/Konnect_text_small.png)

## Konnect ![Konnect](/resources/images/logo/Konnect_icon_small.ico)
### - A job portal for connecting jobseekers and employers. Built with Laravel and React.

Originally, Konnect was built using Codeigniter, AdminLTE with Bootstrap 4.6, Jquery, MySQL, PHP 7.4, and javascript.

This new project has been migrated to Laravel 10, ReactJs, and TailwindCSS.

*******************

## About Laravel

<p style="text-align: center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200">
    </a>
</p>

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

*******************

## Issues

- If you encounter any issues, open a new issue in the issues tab of the repository.
- Please explain the issue in detail and provide screenshots if possible.

*******************

## Run for development
1. Save changes of components in <code>Pages/</code> folder
2. Run in terminal <code>npm run build</code>
3. Start the local server <code>php artisan serve</code>

See the routes in <code>routes/web.php</code>
- For login <code>localhost:8000/login</code>
- For register <code>localhost:8000/register</code>

## Check List for Planned Features

### HIGH Priority

- [ ] Consider migrating to a more modern framework like Laravel for better maintainability.
- [ ] Implement web push notifications using service workers for real-time updates. Use a third-party service like
  OneSignal or Pusher.
- [ ] Allow file attachments for job applications - multiple resumes/CVs, cover letters, portfolio items.
- [ ] Implement email/notification alerts for matching jobs, applicant status updates, etc. Use a third-party email
  service like Mailgun or SendGrid.
- [ ] Implement admin dashboard for managing jobs, users, stats. Add reporting features. Use a third-party analytics
  service like Google Analytics.
- [ ] Add more advanced search and filtering capabilities - location, salary range, job type, etc. Use pagination and
  caching to optimize performance.
- [ ] Implement a job recommendation system based on user skills, interests, and prior activity. Use machine learning
  for more intelligent recommendations.

### LOW Priority


- [ ] Allow rich text formatting for job descriptions and user profiles. Integrate with WYSIWYG editors like TinyMCE or
  CKEditor.
- [ ] Enable location/map features - show jobs on a map, location search and filters, candidate proximity. Integrate
  Google Maps API.
- [ ] Add ability for employers to directly contact applicants through the platform via messaging.
- [ ] Add payment capabilities for premium job listings or highlighted profiles. Integrate with payment gateways. Use
  Stripe or Braintree.
- [ ] Add social login and sharing features. Integrate with Facebook, Twitter, LinkedIn, etc. Use OAuth.
- [ ] Build a mobile-optimized version of the app or create mobile apps for iOS and Android. Use React Native or Ionic.
- [ ] Optimize SEO with meta tags, sitemaps, structured data. Integrate with Google Analytics.
