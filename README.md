# Simple HTTP Request Router

> Latest Version v1.0.0
 
HTTP Request Router is small library used to route HTTP request to particular function defined in a class file

HTTP Request Router is optimized for high performance. It is mainly used to route API requests

NOTE: When you are using this HTTP Request Router, please make sure that, in URL formed, first path variable is your class name, second path variable is your method name inside class and remaining are your request parameters

### Getting started

First, you need to include "RequestRouter.php" and "AppRequest.php" in your project :

```PHP
include("RequestRouter.php");
include("AppRequest.php");
```

NOTE: You can specify absolute path.

#### Usage

Suppose, you want to route API request to to any function present in any class file, then you can do that using HTTP Request Router. You can see the [Example](https://github.com/ghana-c/Simple-HTTP-Request-Router/blob/master/example/index.php) :

In above example, you want to first inlude the class file `RequestRouter` and `AppRequest` as below:

```PHP
include("RequestRouter.php");
include("AppRequest.php");
```

Call the `route` method in class `RequestRouter` by passing object of class `AppRequest` as below :

```PHP
$response = RequestRouter::route(new AppRequest);
```

NOTE: Don't forget to pass `AppRequest` class object to `RequestRouter` as `AppRequest` extract all the HTTP information required to route your request including request data from GET, POST, PUT, DELETE requests etc.

NOTE: Use htaccess rule to route your request as below :

```PHP
RewriteRule (.*?)$ index.php?url_path=$1/ [L,QSA]
```

Please refer the [Example](https://github.com/ghana-c/Simple-HTTP-Request-Router/blob/master/example/index.php). As you can see, your URL must be **http://your-domain-name/class-name/method-name?additional-parameters** e.g. as below :

```PHP
http://localhost/products/details?id=1
```

In above example,

* `products` : Class Name
* `details` : Method Name defined in class `products`
* `id` : GET request parameter

NOTE: You have to declare variable named **$_request** as member variable of class. In above example, this variable is defined in class `Products`

Return variable of this class method is the response, you get via API

**NOTE: If you want to use this [Example](https://github.com/ghana-c/Simple-HTTP-Request-Router/blob/master/example/index.php), please follow rules below :**

1. Set `DocumentRoot` as 
```PHP
/your/projects/directory/RequestRouter/example/
```

2. Use .htaccess file in example directory

### Author

Ghanashyam Chaudhari (mr.ghchaudhari@gmail.com)

### NOTE

Email me at [mr.ghchaudhari@gmail.com](mailto:mr.ghchaudhari@gmail.com) for any queries
