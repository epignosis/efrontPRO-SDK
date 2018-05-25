# eFront-SDK

## REST JSON API DOCUMENTATION

(Version 1.0)

>*The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT",
"SHOULD", "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this
document are to be interpreted as described in *[*RFC
2119*](http://www.ietf.org/rfc/rfc2119.txt)*.*


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

<a name="postman"></a>
You can use [Postman](https://www.getpostman.com/) to test the API. To use it, follow these simple steps:

1. Install Postman to your browser.
2. Sign in as administrator to your eFrontPro's installation and go to admin->system settings->integrations->API
3. Enable the API and copy the API key to the clipboard.
4. Fire up Postman. Select "Basic Auth" for Authorization and paste the API key in the "Username" field. Leave the "Password" field blank.
5. Use the URL  of the address you wish to make requests to. For example:
  1. To get a list of all users, enter the following in the URL section in postman and make a GET request:
  `http://efrontpro.example.com/API/v1.0/Users`
  3. To create a user, make a POST request to the following URL:
  `http://efrontpro.example.com/API/v1.0/User`
  Use the "Body" section to fill in the key-value pairs of the data you wish to send.
  5. To update a user with id 23, make a PUT request to the following URL with the data required:
  `PUT http://efrontpro.example.com/API/v1.0/User/23`
  Use the "Body" section to fill in the key-value pairs of the data you wish to send (Check x-www-form-urlencoded radio button).

  ***

<a name="DocIndex"><h3>Documentation Index</h3></a>

| ***Table of contents***				  |
|-----------------------------------------|
| [Quick Start](#QuickStart)              |
| [API Introduction](#ApiIntro)           |
| [API Requirements](#ApiRequirements)    |
| [API Call Reference](#ApiCallRef)       |
| [API Error Handling](#ApiErrorHandling) |
| [API Authentication](#ApiAuth)          |
| [SDK Introduction](#SdkIntro)           |
| [SDK Requirements](#SdkRequirements)    |
| [SDK Installation](#SdkInstall)         |
| [SDK Examples](#SdkExample)             |

***
 
<a name="QuickStart"><h3>Quick Start</h3></a>

In this quick start we provide you with some very basic information
about how to access the API. More information and examples can be found
in the following chapters.

1.  Access through the command line (cURL):

	```php
	curl -u <MY_API_KEY>: http://my-efront-pro.com/API/v1.0/System/Info
	```

	-   Replace &lt;MY\_API\_KEY&gt; with your API key.

	-   Keep the : symbol after your API key without a space before.

	-   Provide your domain and the API location. In the above example we
		use the API version 1.0 and request information about the system.

2.  Access through the SDK:

    ```php
    $eFrontProSDK->GetAPI('System')->GetInfo();
    ```

	-   See more on how to initialize $eFrontProSDK, [here](#SdkInstall).

>**Note**: To use JSONP, append to the endpoint
`"?callback=<myCallbackName>"` without the quotation marks.

[Back to the Index](#DocIndex)

***

<a name="ApiIntro"><h3>API Introduction</h3></a>

eFrontPro provides a comprehensive REST JSON API that allows
interaction with remote services. Authentication is based on an API key
that is defined under your installation’s system settings. The
functionality provided focuses on performing tasks meaningful for a
remote service, such as user creation, course assignment, listing
courses etc. In addition, one can use the API to provide basic SSO for
users.

To ease implementation of services, we provide a SDK library for PHP
that automates the tasks of communicating with the API.

The first part of this guide provides a detailed description of the
available API calls, as well as information on authentication and error
handling.

The second part of the guide demonstrates the use of the PHP SDK,
providing information on setting it up and performing some basic tasks.

You can find the latest version of this guide
[here](https://github.com/epignosis/efrontPRO-SDK).

For comments and suggestions, visit
[here](http://www.efrontlearning.net/contact).

[Back to the Index](#DocIndex)

***

<a name="ApiRequirements"><h3>API Requirements</h3></a>

API doesn’t have or require different technical requirements than eFront
PRO. If your system meets the eFrontPro's requirements, then it also
meets the requirements of the API.

At this point, you may want to properly configure your web server to
achieve 2 goals, if your web server is different than Apache. If your
web server is Apache __there already exists an .htaccess configuration
file inside the www/API folder__, but you have to enable the mod\_rewrite
module (if not already enabled) on your own or inform your
network/system administrator to do it for you.

1.  The API recognizes only "pretty - SEO friendly" URLs, which means
    that you have to use a rewrite engine (for example
    Apache mod\_rewrite) and set the minimum required conditions
    and rules.

2.  Make sure that if the PHP interacts with your web server through the
    Fast-CGI protocol, usually there exists a problem with the HTTP
    authorization headers, so you have to pass the HTTP authorization
    headers to an environment variable.
	
[Back to the Index](#DocIndex)

***
	
<a name="ApiCallRef"><h3>API Calls Reference</h3></a>
<table>
	<tr><th> Entity   	</td><th> HTTP </th><th> Call                             </th><th> Purpose                                                                                                                                            		 </th></tr>
	<tr><td> Account    </td><td> POST </td><td> /Account/Status                  </td><td> Checks whether a user exists or not by providing the login name and the password.                                                                    	 </td></tr>
	<tr><td rowspan="3"> Branch     </td><td> GET        </td><td> /Branches      </td><td> Returns the branch list.                                                                                                            					 </td></tr>
	<tr>				<td> GET    </td><td> /Branch/:Id                         </td><td> Returns information about the branch with the associated Id.                                                                                             </td></tr>
	<tr>				<td> POST   </td><td> /Branch                             </td><td> Creates a branch with the requested attributes.                                                                                                          </td></tr>                                    
	<tr><td> Branch & User        	</td><td> PUT        </td><td> /Branch/:Id/AddUser                 </td><td> Adds a user to the specified branch. The Id in the URL, refers to the branch. The Id of the user is defined as a PUT field, in the request.</td></tr>
	<tr><td rowspan="2"> Category   </td><td> GET        </td><td> /Categories                         </td><td> Returns the category list (tree structured).                                                                                        </td></tr>
	<tr>				<td> GET    </td><td> /Category/:Id                       </td><td> Returns information about the category with the associated Id.                                                                                           </td></tr>
	<tr><td rowspan="2"> Course     </td><td> GET        </td><td> /Courses       </td><td> Returns the complete list of courses.                                                                                                   				 </td></tr>
	<tr>				<td> GET    </td><td> /Course/:Id                         </td><td> Returns information about the course with the associated Id.                                                                                             </td></tr>
	<tr><td> Curriculum </td><td> GET        </td><td> /curriculums               </td><td> Returns the complete list of curriculums.                                                                                                           	 </td></tr>                     
	<tr><td rowspan="6"> Course & User       </td><td> GET        </td><td> /CourseUserStatus/:CourseId,:UserId </td><td> Returns information about the status of a specified user in the specified course.                                          </td></tr>
	<tr>				<td> POST   </td><td> /CourseUserStatus/:CourseId,:UserId </td><td> Updates a user’s information in the specified course.                                                                                                    </td></tr>
	<tr>				<td> PUT    </td><td> /Course/:Id/AddUser                 </td><td> Adds a user to the specified course. The Id in the URL, refers to the course. The Id of the user is defined as a PUT field, in the request.              </td></tr>
	<tr>				<td> PUT    </td><td> /Course/:Id/RemoveUser              </td><td> Removes a user from the specified course. The Id in the URL, refers to the course. The Id of the user is defined as a PUT field, in the request.         </td></tr>             
	<tr>				<td>GET 	</td><td> /Course/:Id/UserProgress/:UserId 	  </td><td> Returns the progress for a specific user in a specific course.</td></tr>
	<tr>				<td>POST 	</td><td> /CourseUserStatus/:CourseId, :UserId</td><td> Sets the progress for a specific user in a specific course.</td></tr>
	<tr><td rowspan="2"> Curriculum & User        </td><td> PUT   </td><td> /Curriculum/:Id/AddUser             </td><td> Adds a user to the specified curriculum. The Id in the URL, refers to the curriculum. The Id of the user is defined as a PUT field, in the request.      </td></tr>
	<tr>				<td> PUT    </td><td> /Curriculum/:Id/RemoveUser          </td><td> Removes a user from the specified curriculum. The Id in the URL, refers to the curriculum. The Id of the user is defined as a PUT field, in the request. </td></tr>
	<tr><td rowspan="2"> Group      </td><td> GET        </td><td> /Groups        </td><td> Returns the entire group list.                                                                                                          				 </td></tr>
	<tr>				<td> GET    </td><td> /Group/:Id                          </td><td> Returns information about the group with the associated Id.                                                                                              </td></tr>                     
	<tr><td rowspan="2"> Group & User        </td><td> PUT       </td><td>  /Group/:Id/AddUser                  </td><td> Adds a user to the specified group. The Id in the URL, refers to the group. The Id of the user is defined as a PUT field, in the request.</td></tr>
	<tr>				<td> PUT    </td><td> /Group/:Id/RemoveUser               </td><td> Removes a user from the specified group. The Id in the URL, refers to the group. The Id of the user is defined as a PUT field, in the request.          </td></tr>
	<tr><td rowspan="3"> Plugin     </td><td> GET        </td><td> /Plugins       </td><td> Returns a list of the available plugins and their information.                                                                          				</td></tr>
	<tr>				<td> GET    </td><td> /Plugin/:pluginName                 </td><td> Same as the above, but for the requested plugin.                                                                                                        </td></tr>
	<tr>				<td> POST   </td><td> /Plugin/:pluginName                 </td><td> Posts data to be used by the requested plugin.                                                                                                          </td></tr>
	<tr><td rowspan="9"> User   </td><td> GET  </td><td> /Autologin/:loginName 	  </td><td> Returns the auto-login URL for the requested user.                                                                                                      </td></tr>
	<tr>				<td> GET  </td><td> /Logout/:loginName    </td><td> Logouts the requested user.                                                                                                                                             </td></tr>
	<tr>				<td> POST </td><td> /User                 </td><td> Creates a new user given some registration information. The information are defined as POST data fields. The required information to create successfully a user are the “login”, “name”, “surname”, “email” and “password”. In the future we plan to add some more fields. </td></tr>
	<tr>				<td> GET  </td><td> /Users                </td><td> Returns the entire user list.                                                                                                                                                                                                                                              </td></tr>
	<tr>				<td> GET  </td><td> /Users/:eMail         </td><td> Returns a list of users which they have the requested e-mail address.                                                                                                                                                                                                      </td></tr>
	<tr>				<td> GET  </td><td> /User/:Id             </td><td> Returns information about the user with the associated Id.                                                                                                                                                                                                                 </td></tr>
	<tr>				<td> PUT  </td><td> /User/:Id             </td><td> Edits the specified user.                                                                                                                                                                                                                                                  </td></tr>
	<tr>				<td> PUT  </td><td> /User/:Id/Activate    </td><td> Activates the specified user.                                                                                                                                                                                                                                              </td></tr>
	<tr>				<td> PUT  </td><td> /User/:Id/Deactivate  </td><td> Deactivates the specified user.                                                                                                                                                                                                                                            </td></tr>
	<tr><td> System </td><td> GET </td><td> /System/Info          </td><td> Returns information about the system.                                                                                                                                                                                                                                      </td></tr>
	<tr><td rowspan="4">Job</td><td>POST</td><td>/Job</td><td>Creates a new job position in the system.</td></tr>
	<tr><td>PUT</td><td>/Job/:Id</td><td>Edits a specified job position in the system.</td></tr>
	<tr>						<td>GET</td><td>/Job/:Id</td><td>Gets information about a new job position in the system.</td></tr>
	<tr>						<td>GET</td><td>/Jobs</td><td>Gets information about all job positions in the system.</td></tr>
	<tr><td rowspan="2">Job & User</td><td>PUT</td><td>/Job/:Id/AddUser</td><td>Assigns a user to a job position in the system.</td></tr>
	<tr>							   <td>PUT</td><td>/Job/:Id/RemoveUser</td><td>Removes a user from a job position in the system.</td></tr>
	<tr><td rowspan="3">Training Session</td><td>GET</td><td>/training-sessions</td><td>Returns a list of all training sessions in the system.</td></tr>
	<tr>									 <td>GET</td><td>/training-session/:Id</td><td>Returns information about a specific training sessions.</td></tr>
	<tr>									 <td>GET</td><td>/training-session/:Id/users</td><td>Returns a list of users about a specific training sessions.</td></tr>
	<tr><td>Training Session & User</td><td>GET</td><td>/course/:Id/training-sessions</td><td>Returns information about all training sessions for a specific course.</td></tr>
</table> 

[Back to the Index](#DocIndex)

***

<a name="ApiErrorHandling"><h3>API Error Handling</h3></a>

The error state handling of the API is very easy. In each response a key
“**success**” is always included. This key contains the value “**true**”
in case of success or “**false**” when something has gone wrong. That
way you can easily check if the call to the API was succeed or failed.

Except that, we offer an additional methodology to be informed about the
error states, and this is by the HTTP response status codes. Anything
different than **200**, MUST be considered as an error state.

When an error has been occurred you can find into the body of the
response some other useful information such as its code, a generic
message and optionally a more technical reason. For a live demonstration
of the API calls and their responses (succeed and failed) you can use
this [tool](#postman).

| ***HTTP Status Code*** | ***Reason***                                                                                          |
|------------------------|-------------------------------------------------------------------------------------------------------|
| **503**                | -   Service unavailable. API status is disabled.                                                      |
| **405**                | -   Unsupported HTTP method. Only GET, POST and PUT are currently supported.                          |
| **404**                | -   The requested API call does not exist. <br> -   The requested entity (User, Course, etc) which is specified for example by an Id, does not exist.|
| **401**                | -   Authentication required.                                                                          |
| **400**                | -   General HTTP status code, if the action can’t be processed.                                       |

[Back to the Index](#DocIndex)

***

<a name="ApiAuth"><h3>API Authentication</h3></a>

eFrontPro API doesn’t offer any call that it’s public, in other words
that it isn’t require authentication. So you MUST authenticate your
requests in order to use the API. But before this step, you have to
enable its status and find out your personal private API key.

To enable the API, just navigate to your “**System Settings**” through
the eFrontPro administration control panel and proceed to the “**API**”
tab. Check the “**Enable API**” checkbox and click on the “**Save**”
button.

Once you have enabled the API, copy your personal private API key to use
it later on the SDK. In case that someone finds out this key, you can
always generate a new one by clicking on the “**refresh**” icon.

More information about how you MUST authenticate your requests (API
calls) with your personal private key, you can read [here](#SdkInstall).

[Back to the Index](#DocIndex)

***

<a name="SdkIntro"><h3>API SDK Introduction</h3></a>

With the eFrontPro SDK, you will be able to use its API easily and
efficiently without advanced programming knowledge.

Programming Language: **PHP** | Version: **2.0.0** | API Support:
**1.0**

[Back to the Index](#DocIndex)

***

<a name="SdkRequirements"><h3>SDK Requirements</h3></a>

If your system meets the eFrontPro's requirements, then it also meets
the requirements of the SDK.

[Back to the Index](#DocIndex)

***

<a name="SdkInstall"><h3>SDK Installation</h3></a>

In this section, we will analyze how to install your SDK. You MUST
follow the below steps in order to work with the SDK:

1.  Download the SDK (ZIP Archive).

2.  Extract its contents anywhere you want inside your web server’s
    document root. The document root is the folder where the website
    files for a domain name are stored. You SHOULD contact your
    administrator in case that you aren’t sure about this action. 

3.  Create a php file inside the Source folder (the folder that the
    AutoLoader.php file is located). There is no restriction about the
    name of this file, but it’s RECOMMENDED to name it **index.php**.

4.  Now paste the below code in the file you just create in order to
    start making calls:

    ```php
	<?php
    include ‘AutoLoader.php’;

    use Epignosis\eFrontPro\Sdk\eFrontProSDK as eFrontProSDK;
    use Epignosis\eFrontPro\Sdk\Factory\Handler\API as Api;
    use Epignosis\eFrontPro\Sdk\Request\Handler\cURL as cUrl;

    $apiVersion = ‘1.0’;
    $apiLocation = ‘my-domain.com/API’;
    $apiKey = ‘0123456789abcdef’;

    $eFrontProSDK = new eFrontProSDK(new Api(new cUrl));
    $eFrontProSDK->Config($apiVersion, $apiLocation, $apiKey);
	```	

[Back to the Index](#DocIndex)

***

<a name="SdkExample"><h3>SDK Examples</h3></a>

In the previous [section](#SdkInstall) you learn how you can install the
SDK. Moreover on step 4, you initialize the SDK with its dependencies,
the version and of course your API key and its location.

So far you did a lot, which means that your requests now will be
automatically authenticated and you won’t have to worry about URL
construction for each unique call of the API. That’s the responsibility
of the SDK.

In the below use cases, __each method of the GetAPI method__ returns a
string in JSON encoded format. You MUST decode it (json\_decode), in
order to access the properties of the response. SDK doesn’t decode
automatically these responses/strings, because sometimes it’s useful to
store immediately this string into a database or create an array of
multiple JSON encoded strings and do another work with it.

Finally it’s __always RECOMMENDED__ as a good practice, to use the SDK
inside a try/catch block. For example:

```php
try {
	// various SDK commands...
} catch (\Exception $e) {
	echo ‘Oops! An error occurred. [’, $e->getMessage(), ‘, ’, $e->getCode(), ‘]’;
}

```

***BASIC EXAMPLES***

***Check the status of an account.***

```php
$eFrontProSDK->GetAPI(‘Account’)->Exists($loginName, $password);
```

***Get all the branches*.**

```php
php$eFrontProSDK->GetAPI(‘BranchList’)->GetAll();
```

***Get information about a branch*.**
 `GetInfo` method, accepts a positive integer as the branch Id.

```php
$eFrontProSDK->GetAPI(‘Branch’)->GetInfo($branchId);
```

***Create a branch*.**
 `Create` method, accepts an associative array as the branch information to be created. The required information consisted
 of the `"name"` and `"url"`, `"parent_ID"` and `"public_ID"` are optional.

```php
$eFrontProSDK->GetAPI(‘Branch’)->Create([
	'name' => 'foo', 'url' => 'foo', 'parent_ID' => 10, 'public_ID' => 'abc123'
]);

```

***Add a user in a branch*.**
 `AddRelation` method, accepts 2 parameters which both are positive integers. The 1<sup>st</sup> one refers to the
 user’s Id and the 2<sup>nd</sup> to the branch’s Id.

```php
$eFrontProSDK->GetAPI(‘BranchUser’)->AddRelation($userId, $branchId);
```

***Get all the categories (tree structured)*.**

```php
$eFrontProSDK->GetAPI(‘CategoryList’)->GetAll();
```

***Get information about a category*.**
 `GetInfo` method, accepts a positive integer as the category Id.

```php
$eFrontProSDK->GetAPI(‘Category’)->GetInfo($categoryId);
```

***Get all courses*.**

```php
$eFrontProSDK->GetAPI(‘CourseList’)->GetAll();
```

***Get information about a course*.**
 `GetInfo` method, accepts a positive integer as the course Id.

```php
$eFrontProSDK->GetAPI(‘Course’)->GetInfo($courseId);
```

***Get all curicula*.**

```php
$eFrontProSDK->GetAPI(‘Curriculums’)->GetAll();
```

***Get all the groups*.**

```php
$eFrontProSDK->GetAPI(‘GroupList’)->GetAll();
```

***Get information about a group*.**
 `GetInfo` method, accepts a positive integer as the group Id.

```php
$eFrontProSDK->GetAPI(‘Group’)->GetInfo($groupId);
```

***Get all the plugins*.**

```php
$eFrontProSDK->GetAPI(‘Plugin’)->GetAll();
```

***Get information about a plugin*.**
 `GetInfo` method, accepts a string as the plugin name.

```php
$eFrontProSDK->GetAPI(‘Plugin’)->GetInfo($pluginName);
```

***Notify the specified plugin by sending some data*.**
 `Notify` method, accepts a string as the plugin name (1<sup>st</sup> parameter) and an
 array (2<sup>nd</sup> parameter) with the custom notification data.

```php
$eFrontProSDK->GetAPI(‘Plugin’)->Notify($pluginName, $data);
```

***Get all the users*.**

```php
$eFrontProSDK->GetAPI(‘UserList’)->GetAll();
```

***Get all the users by their e-mail address*.**
 `GetAllByMail` method, accepts a string as the e-mail address of a user.

```php
$eFrontProSDK->GetAPI(‘UserList’)->GetAllByMail($mailAddress);
```

***Get information about a user*.**
 `GetInfo` method, accepts a positive integer as the user Id.

```php
$eFrontProSDK->GetAPI(‘User’)->GetInfo($userId);
```

***Activate a user*.**
 `Activate` method, accepts a positive integer as the user Id.

```php
$eFrontProSDK->GetAPI(‘User’)->Activate($userId);
```

***Deactivate a user*.**
 `Deactivate` method, accepts a positive integer as the user Id.

```php
$eFrontProSDK->GetAPI(‘User’)->Deactivate($userId);
```

***Create a user*.**
 `Create` method, accepts an associative array as the user’s information to be created. The required information consisted of
 the login, name, surname, email and password fields.

```php
$eFrontProSDK->GetAPI(‘User’)->Create ([
   'login' => 'foo', 'name' => 'bar', 'surname' => 'baz', 'email' => 'foo@bar.buz', 'password' => 'blackWhale'
]);

```

***Edit a user*.**
 Edit method, accepts 2 parameters. The 1<sup>st</sup>
 parameter is a positive integer as the user Id and the 2<sup>nd</sup> an
 associative array as the user’s information to be edited. The keys of
 the array are the same as the above method (Create) but aren’t required
 all of them, so you can edit only the information which you want.

```php
$eFrontProSDK->GetAPI(‘User’)->Edit (
 	$userId, ['login' => 'foo1', 'password' => 'blackWhale123']
);

```

***Add a user in a group*.**
 `AddRelation` method, accepts 2 parameters
 which both are positive integers. The 1<sup>st</sup> one refers to the
 user’s Id and the 2<sup>nd</sup> to the group’s Id.

```php
$eFrontProSDK->GetAPI(‘UserGroup’)->AddRelation($userId, $groupId);
```

***Remove a user from a group*.**
 `RemoveRelation` method, accepts 2
 parameters which both are positive integers. The 1<sup>st</sup> one
 refers to the user’s Id and the 2<sup>nd</sup> to the group’s Id.

```php
$eFrontProSDK->GetAPI(‘UserGroup’)->RemoveRelation($userId, $groupId);
```

***Add a user in a course*.**
 `AddRelation` method, accepts 3 parameters
 which. The 1<sup>st</sup> one refers to the user’s Id (positive
 integer), the 2<sup>nd</sup> to the course’s Id (positive integer) and
 3<sup>rd</sup> to whether you want to force the operation or not, if the requested
 course belongs to a curriculum. The last parameter is set to false by
 default.

```php
$eFrontProSDK->GetAPI(‘CourseUser’)->AddRelation($userId, $courseId, $force);
```

***Add a user in a curriculum*.**
 `AddRelation` method, accepts 3
 parameters which. The 1<sup>st</sup> one refers to the user’s Id
 (positive integer), the 2<sup>nd</sup> to the curriculum’s Id (positive
 integer) and 3rd to whether you want to force the operation or not. The
 last parameter is set to false by default.

```php
$eFrontProSDK->GetAPI(‘CurriculumUser’)->AddRelation($userId, $curriculumId, $force);
```

***Check the status of a user in a course*.**
 `CheckStatus` method,
 accepts 2 parameters which both are positive integers. The
 1<sup>st</sup> one refers to the user’s Id and the 2<sup>nd</sup> to the
 course’s Id.

```php
$eFrontProSDK->GetAPI(‘CourseUser’)->CheckStatus($userId, $courseId);
```

***Update the status of a user in a course*.**
 `UpdateStatus` method,
 accepts 3 parameters. The first 2 are positive integers. The
 1<sup>st</sup> one refers to the user’s Id and the 2<sup>nd</sup> to the
 course’s Id. The last is an array which contains the update info.

```php
$eFrontProSDK->GetAPI(‘CourseUser’)->UpdateStatus (
    $userId, $courseId,
    [‘score’ => 100, ‘to_timestamp’ => 1418893082, ‘status’ => ‘completed’]
);

```

***Remove a user from a course*.**
 `RemoveRelation` method, accepts 2
 parameters which both are positive integers. The 1<sup>st</sup> one
 refers to the user’s Id and the 2<sup>nd</sup> to the course’s Id.

```php
$eFrontProSDK->GetAPI(‘CourseUser’)->RemoveRelation($userId, $courseId);
```

***Remove a user from a curriculum*.**
 `RemoveRelation` method, accepts 2
 parameters which both are positive integers. The 1<sup>st</sup> one
 refers to the user’s Id and the 2<sup>nd</sup> to the curriculum’s Id.

```php
$eFrontProSDK->GetAPI(‘CurriculumUser’)->RemoveRelation($userId, $curriculumId);
```

***Get information about the system*.**

```php
$eFrontProSDK->GetAPI(‘System’)->GetInfo();
```

***Autologin a user*.**
 `Autologin` method, accepts a string as the user’s login name.

```php
$eFrontProSDK->GetAPI(‘User’)->AutoLogin($loginName);
```

***Logout a user*.**
 `Logout` method, accepts a string as the user’s login name.

```php
$eFrontProSDK->GetAPI(‘User’)->Logout($loginName);
```

***ADVANCED EXAMPLES***

**Logout all the users:**

```php
try {

    // Fetch all the users:
    $userList = json_decode (
        $eFrontProSDK->GetAPI('UserList')->GetAll(), true
    );
    
    // Check if the call was succeed:
    if (!$userList['success']) {
        throw new \Exception ( $userList['error']['message'], $userList['error']['code'] );
    }

    // Iterate through the user list:
    foreach ($userList['data'] as $user) {
        $logoutResponse = json_decode (
            $eFrontProSDK->GetAPI('User')->Logout($user['login']),
            true
        );
        
        echo 'User <b>', $user['login'], '</b> was ';
    
        // Check whether the logout process was succeed or not:
        if ($logoutResponse['success']) {
            echo 'logout with success.<br>';
        } else {
            echo 'not possible to logout.<br>';
        }
    }
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

**Activate all the users with odd Id and deactivate these with even Id:**

```php
try {

    // Fetch all the users:
    $userList = json_decode (
        $eFrontProSDK->GetAPI('UserList')->GetAll(), true
    );
    
    // Check if the call was succeed:
    if (!$userList['success']) {
        throw new \Exception ($userList['error']['message'], $userList['error']['code']);
    }
    
    // Iterate through the user list:
    foreach ($userList['data'] as $user) {
        $apiUser = $eFrontProSDK->GetAPI('User');
        $evenNumber = $user['id'] % 2 == 0;
        $response = 
            ($evenNumber) 
                ? json_decode ( 
                    $eFrontProSDK->GetAPI('User')->Deactivate($user['id']), true
                  )
                : json_decode (
                    $eFrontProSDK->GetAPI('User')->Activate($user['id']), true
                );
    
        echo 'User <b>', $user['login'], '</b> was ';
        
        if ($response['success']) {
            echo $evenNumber ? 'deactivated' : 'activated', ' with success.<br>';
        } else {
            echo 'not possible to ', $evenNumber ? 'deactivated' : 'activated', '<br>';
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

**Create a user (assuming a male), assign him to a course and get the login URL by auto login him:**

```php
try {
    
    // Create the user:
    $userInfo = [
        'login'    => 'efront',
        'name'     => 'efront',
        'surname'  => 'efront',
        'email'    => 'xarhsdev@efrontlearning.net',
        'password' => 'foobarbuz'
    ];
    
    $userCreation = json_decode (
        $eFrontProSDK->GetAPI('User')->Create($userInfo), true
    );
    
    // Throw an exception if the creation was failed:
    if (!$userCreation['success']) {
        throw new \Exception ( $userCreation['error']['message'], $userCreation['error']['code']);
    }
    
    // Get the course list:
    $courseList = json_decode (
        $eFrontProSDK->GetAPI('CourseList')->GetAll(), true
    );
    
    // Throw an exception if the call was failed:
    if (!$courseList['success']) {
        throw new \Exception ($courseList['error']['message'], $courseList['error']['code']);
    }
    
    // Assign our user to the 1st course of the course list:
    $course = reset($courseList['data']);
    
    $courseAssignResult = json_decode (
        $eFrontProSDK->GetAPI('CourseUser')->AddRelation (
            // The Create method was returned his Id:
            $userCreation['data']['id'], $course['id']
        ), true
    );
    
    // Throw an exception if the call was failed:
    if (!$courseAssignResult['success']) {
        throw new \Exception ($courseAssignResult['error']['message'], $courseAssignResult['error']['code']);
    }
    
    // Fetch the auto-login URL:
    $autoLoginResult = json_decode (
        $eFrontProSDK->GetAPI('User')->Autologin($userInfo['login']), true
    );
    
    // Throw an exception if the call was failed:
    if (!$autoLoginResult['success']) {
        throw new \Exception ($autoLoginResult['error']['message'], $autoLoginResult['error']['code']);
    }
    
    $autoLoginURL = $autoLoginResult['data'];
    // ..
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

**For each registered user, print information about courses:**

```php
try {
    
    // Fetch the user list:
    $userList = json_decode(
        $eFrontProSDK->GetAPI('UserList')->GetAll(), true
    );
    if (!$userList['success']) {
        throw new \RuntimeException ( $userList['error']['message'], $userList['error']['code']);
    }
    
    echo
        '<table border=3 cellpadding=10><tbody><tr>',
        '<th>Id</th>',
        '<th>Login</th>',
        '<th>Name</th>',
        '<th>Surname</th>',
        '<th>e-Mail</th>',
        '<th>Courses [Name, Status]</th>',
        '<th>Avg. Score</th></tr>';
        
    foreach ($userList['data'] as $user) {
        // For the current user fetch the courses that he/she is
        // registered to:
        
        $userInfo = json_decode (
            $eFrontProSDK->GetAPI('User')->GetInfo($user['id']), true
        );
        
        if (!$userInfo['success']) {
            throw new \RuntimeException ($userInfo['error']['message'], $userInfo['error']['code']);
        }
    
        echo
            '<tr><td>', $user['id'], '</td>',
            '<td>', $user['login'], '</td>',
            '<td>', $user['name'], '</td>',
            '<td>', $user['surname'], '</td>',
            '<td>', $user['email'], '</td><td>';
        
        $courseList = $userInfo['data']['courses']['list'];
        if (empty($courseList)) {
            $avgScore = '-';
            echo '-';
        } else {
            $avgScore = 0.0;
            $c = 0;
            
            foreach ($courseList as $info) {
                $avgScore += $info['score'];
                $c++;
    
                echo
                    sprintf (
                        '[%s, %s]<br>',
                        $info['formatted_name'],
                        $info['status']
                    );
             }
    
            if ($c > 0) {
                $avgScore /= $c;
                $avgScore = round($avgScore, 2);
            }
        }
        echo '</td><td>' . $avgScore . '</td></tr>';
    }
    
    echo '</tbody></table>';
    
} catch (\Exception $e) {
    echo $e->getMessage();
}
```

[Back to the Index](#DocIndex)
