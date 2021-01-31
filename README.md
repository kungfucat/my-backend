# my-backend

Contains the backend of Word Doc Converter application.

## To start the server:

`php -S localhost:8000 -t public`



## To get a word document:

send a GET request to `/reports` and set the parameter, `textBlock` to the text which is required in the Word Document.


## Why not API-Platform?

I was able to clone the package and get it running and figured out that I only needed to add a custom controller to handle requests coming to `/reports` similar to how it works in the current server.
- The API-platform requires PHP>=8.0, I installed PHP 8.0.1 and got it running.
