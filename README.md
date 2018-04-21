# Khigashiguchi.RestfulSNS

## Installation

    composer install

## Basic Design
https://gist.github.com/Khigashiguchi/9b47bd9eea66e87e6f5f2c79af61c2e1

## Features
### Articles
#### GET /articles/:id

```
$ composer api get 'app://self/articles/1'
```
   
```
200 OK
content-type: application/hal+json

{
	"article": {
		"id": "1",
		"user_id": "1",
		"title": "test",
		"description": "test",
		"status": "draft",
		"created": "15:37:47",
		"updated": "15:37:47"
	},
	"_links": {
		"self": {
			"href": "/articles/1"
		}
	}
}
```

#### GET /articles

```
$ composer api get 'app://self/articles'
```

```
200 OK
content-type: application/hal+json

{
    "0": {
        "id": "1",
        "user_id": "1",
        "title": "test",
        "description": "test",
        "status": "draft",
        "created": "15:37:47",
        "updated": "15:37:47"
    },
    "_links": {
        "self": {
            "href": "/articles"
        }
    }
}

```

### POST /articles

```$xslt
$ composer api post 'app://self/articles?user_id=1&title=post_test'
```

```$xslt
201 Created
Location: /articles/3
content-type: application/hal+json
```

## Usage

### Run server

    COMPOSER_PROCESS_TIMEOUT=0 composer serve

### Console

    composer web get /
    composer api get /

### QA

    composer test       // phpunit
    composer coverage   // test coverate
    composer cs         // lint
    composer cs-fix     // lint fix
    vendor/bin/phptest  // test + cs
    vendor/bin/phpbuild // phptest + doc + qa
