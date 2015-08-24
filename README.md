efrontPRO-SDK
=============
[![Build Status](https://scrutinizer-ci.com/g/xarhsdev/efrontPRO-SDK/badges/build.png?b=master)](https://scrutinizer-ci.com/g/xarhsdev/efrontPRO-SDK/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xarhsdev/efrontPRO-SDK/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xarhsdev/efrontPRO-SDK/?branch=master)

eFrontPro provides a comprehensive REST JSON API that allows interaction with remote services. 
Authentication is based on an API key that is defined under your installation’s system settings. 
The functionality provided focuses on performing tasks meaningful for a remote service, such as 
user creation, course assignment, listing courses etc. In addition, one can use the API to provide 
basic SSO for users.

To ease implementation of services, we provide a SDK library for PHP that automates the tasks of 
communicating with the API. The first part of this guide provides a detailed description of the 
available API calls, as well as information on authentication and error handling. The second part of 
the guide demonstrates the use of the PHP SDK, providing information on setting it up and performing 
some basic tasks.

You can use [Postman](https://www.getpostman.com/) to test the API. To use it, follow these simple steps:

1. Install Postman to your browser.
2. Sign in as administrator to your eFrontPro's installation and go to admin->system settings->integrations->API
3. Enable the API and copy the API key to the clipboard
4. Fire up Postman. Select "Basic Auth" for Authorization and paste the API key in the "Username" field. Leave the "Password" field blank.
5. Use the URL  of the address you wish to make requests to. For example:
  1. To get a list of all users, enter the following in the URL section in postman and make a GET request:
  `http://efrontpro.example.com/API/v1.0/Users`
  3. To create a user, make a POST request to the following URL:
  `http://efrontpro.example.com/API/v1.0/User`
  Use the "Body" section to fill in the key-value pairs of the data you wish to send
  5. To update a user with id 23, make a PUT request to the following URL with the data required:
  `PUT http://efrontpro.example.com/API/v1.0/User/23`
  Use the "Body" section to fill in the key-value pairs of the data you wish to send


The eFrontPro team.
