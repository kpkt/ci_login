#Codeigniter Example Simple Login
Codeigniter Login

#Database

```go

--
-- Database: `ci_login`
--

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` char(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
```


#Custome Config

Custome config in /application/config/config.php

##Default Password
Define default password when add new user
```php
$config['dafault_password'] = 'sp5OXx46Iw';
```

##Bad Password
Define list of bad password not allow user using it when registration

```php
$config['bad_password'] = array(
    'password',
    '12343456789',
    'abcd', 'wxyz', 'qwerty',
    'zaq1', '2wsx', 'cde3'
);
```

#Modul

* Login validation for account exist and wrong password
* Validate password with disallow user to using common/simple password
* Configure for default password when create new user
* Change new password with checking current password