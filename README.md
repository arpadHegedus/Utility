# Utility

## Table of Contents

* [Arr](#arr)
    * [get](#get)
    * [group](#group)
    * [keys](#keys)
    * [remove](#remove)
    * [set](#set)
    * [sort](#sort)
    * [sortKeys](#sortkeys)
    * [values](#values)
    * [abides](#abides)
    * [abidesAny](#abidesany)
    * [add](#add)
    * [dd](#dd)
    * [dump](#dump)
    * [merge](#merge)
    * [getShallowType](#getshallowtype)
    * [append](#append)
    * [average](#average)
    * [blueprint](#blueprint)
    * [clean](#clean)
    * [contains](#contains)
    * [containsAll](#containsall)
    * [containsAny](#containsany)
    * [divide](#divide)
    * [dot](#dot)
    * [each](#each)
    * [filter](#filter)
    * [find](#find)
    * [findAll](#findall)
    * [first](#first)
    * [flatten](#flatten)
    * [has](#has)
    * [hasAll](#hasall)
    * [hasAny](#hasany)
    * [implode](#implode)
    * [initial](#initial)
    * [intersection](#intersection)
    * [intersects](#intersects)
    * [isAssoc](#isassoc)
    * [isNumeric](#isnumeric)
    * [isSequential](#issequential)
    * [last](#last)
    * [map](#map)
    * [mapRecursive](#maprecursive)
    * [matches](#matches)
    * [matchesAny](#matchesany)
    * [max](#max)
    * [min](#min)
    * [normalize](#normalize)
    * [prepend](#prepend)
    * [pluck](#pluck)
    * [random](#random)
    * [range](#range)
    * [reject](#reject)
    * [removeFirst](#removefirst)
    * [removeLast](#removelast)
    * [removeValue](#removevalue)
    * [repeat](#repeat)
    * [replace](#replace)
    * [rest](#rest)
    * [reverse](#reverse)
    * [search](#search)
    * [size](#size)
    * [undot](#undot)
    * [unique](#unique)
    * [without](#without)
* [Chain](#chain)
    * [__construct](#__construct)
    * [break](#break)
    * [swap](#swap)
    * [__call](#__call)
    * [start](#start)
* [Collection](#collection)
    * [abides](#abides-1)
    * [abidesAny](#abidesany-1)
    * [add](#add-1)
    * [dd](#dd-1)
    * [dump](#dump-1)
    * [merge](#merge-1)
    * [getShallowType](#getshallowtype-1)
    * [get](#get-1)
    * [group](#group-1)
    * [keys](#keys-1)
    * [remove](#remove-1)
    * [set](#set-1)
    * [sort](#sort-1)
    * [sortKeys](#sortkeys-1)
    * [values](#values-1)
* [Func](#func)
    * [cache](#cache)
    * [call](#call)
    * [once](#once)
    * [only](#only)
    * [throttle](#throttle)
* [Geo](#geo)
    * [address](#address)
    * [addressDistance](#addressdistance)
    * [distance](#distance)
    * [getAddress](#getaddress)
    * [getDistance](#getdistance)
* [Misc](#misc)
    * [abides](#abides-2)
    * [abidesAny](#abidesany-2)
    * [add](#add-2)
    * [dd](#dd-2)
    * [dump](#dump-2)
    * [merge](#merge-2)
    * [getShallowType](#getshallowtype-2)
* [Num](#num)
    * [abides](#abides-3)
    * [abidesAny](#abidesany-3)
    * [add](#add-3)
    * [dd](#dd-3)
    * [dump](#dump-3)
    * [merge](#merge-3)
    * [getShallowType](#getshallowtype-3)
    * [accord](#accord)
    * [fileSize](#filesize)
    * [format](#format)
    * [isBetween](#isbetween)
    * [isEven](#iseven)
    * [isNegative](#isnegative)
    * [isOdd](#isodd)
    * [isOutside](#isoutside)
    * [isPositive](#ispositive)
    * [limit](#limit)
    * [max](#max-1)
    * [min](#min-1)
    * [ordinal](#ordinal)
    * [pad](#pad)
    * [percentOf](#percentof)
* [Obj](#obj)
    * [get](#get-2)
    * [group](#group-2)
    * [keys](#keys-2)
    * [remove](#remove-2)
    * [set](#set-2)
    * [sort](#sort-2)
    * [sortKeys](#sortkeys-2)
    * [values](#values-2)
    * [abides](#abides-4)
    * [abidesAny](#abidesany-4)
    * [add](#add-4)
    * [dd](#dd-4)
    * [dump](#dump-4)
    * [merge](#merge-4)
    * [getShallowType](#getshallowtype-4)
    * [has](#has-1)
    * [properties](#properties)
    * [methods](#methods)
    * [unpack](#unpack)
* [Str](#str)
    * [abides](#abides-5)
    * [abidesAny](#abidesany-5)
    * [add](#add-5)
    * [dd](#dd-5)
    * [dump](#dump-5)
    * [merge](#merge-5)
    * [getShallowType](#getshallowtype-5)
    * [accord](#accord-1)
    * [alpha](#alpha)
    * [alphaNumeric](#alphanumeric)
    * [append](#append-1)
    * [ascii](#ascii)
    * [at](#at)
    * [base64](#base64)
    * [between](#between)
    * [bool](#bool)
    * [camel](#camel)
    * [chars](#chars)
    * [clean](#clean-1)
    * [collapse](#collapse)
    * [common](#common)
    * [commonPrefix](#commonprefix)
    * [commonSuffix](#commonsuffix)
    * [contains](#contains-1)
    * [containsAll](#containsall-1)
    * [containsAny](#containsany-1)
    * [count](#count)
    * [dashed](#dashed)
    * [delimit](#delimit)
    * [endsWith](#endswith)
    * [endsWithAny](#endswithany)
    * [ensureLeft](#ensureleft)
    * [ensureRight](#ensureright)
    * [fileSize](#filesize-1)
    * [first](#first-1)
    * [htmlDecode](#htmldecode)
    * [htmlEncode](#htmlencode)
    * [index](#index)
    * [indexes](#indexes)
    * [insert](#insert)
    * [isAlpha](#isalpha)
    * [isAlphanumeric](#isalphanumeric)
    * [isBase64](#isbase64)
    * [isBlank](#isblank)
    * [isEmail](#isemail)
    * [isHexadecimal](#ishexadecimal)
    * [isHTML](#ishtml)
    * [isIP](#isip)
    * [isJSON](#isjson)
    * [isLower](#islower)
    * [isRegex](#isregex)
    * [isSerialized](#isserialized)
    * [isUpper](#isupper)
    * [isURL](#isurl)
    * [last](#last-1)
    * [lastIndex](#lastindex)
    * [length](#length)
    * [limit](#limit-1)
    * [limitWords](#limitwords)
    * [lines](#lines)
    * [lower](#lower)
    * [lowerFirst](#lowerfirst)
    * [matches](#matches-1)
    * [normalize](#normalize-1)
    * [ordinal](#ordinal-1)
    * [pad](#pad-1)
    * [padBoth](#padboth)
    * [padLeft](#padleft)
    * [padRight](#padright)
    * [pascal](#pascal)
    * [prepend](#prepend-1)
    * [random](#random-1)
    * [regexReplace](#regexreplace)
    * [remove](#remove-3)
    * [removeLeft](#removeleft)
    * [removeRight](#removeright)
    * [repeat](#repeat-1)
    * [replace](#replace-1)
    * [reverse](#reverse-1)
    * [shuffle](#shuffle)
    * [slice](#slice)
    * [slug](#slug)
    * [slugify](#slugify)
    * [snake](#snake)
    * [spacesToTabs](#spacestotabs)
    * [split](#split)
    * [startsWith](#startswith)
    * [startsWithAny](#startswithany)
    * [stringReplace](#stringreplace)
    * [stripWhitespace](#stripwhitespace)
    * [sub](#sub)
    * [tabsToSpaces](#tabstospaces)
    * [template](#template)
    * [timesContains](#timescontains)
    * [title](#title)
    * [titlize](#titlize)
    * [trim](#trim)
    * [trimLeft](#trimleft)
    * [trimRight](#trimright)
    * [underscored](#underscored)
    * [upper](#upper)
    * [upperFirst](#upperfirst)
    * [words](#words)
* [URL](#url)
    * [auth](#auth)
    * [build](#build)
    * [current](#current)
    * [fragment](#fragment)
    * [fragmentSet](#fragmentset)
    * [host](#host)
    * [hostSet](#hostset)
    * [parse](#parse)
    * [parts](#parts)
    * [pass](#pass)
    * [path](#path)
    * [pathRemove](#pathremove)
    * [pathSet](#pathset)
    * [port](#port)
    * [portSet](#portset)
    * [query](#query)
    * [queryAdd](#queryadd)
    * [queryArray](#queryarray)
    * [queryGet](#queryget)
    * [queryRemove](#queryremove)
    * [querySet](#queryset)
    * [scheme](#scheme)
    * [schemeSet](#schemeset)
    * [user](#user)

## Arr





* Full name: \Utility\Arr
* Parent class: \Utility\Collection


### get

Get a value of a $collection by a $key of $separator notation with $default fallback

```php
Arr::get( array|object $collection, string $key = '', mixed $default = null, string $separator = '.' ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$default` | **mixed** |  |
| `$separator` | **string** |  |




---

### group

Group values from a $collection according to the results of a $callback

```php
Arr::group( array|object $collection, callable $callback ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$callback` | **callable** |  |




---

### keys

Get keys from a $collection

```php
Arr::keys( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

### remove

Remove a $key value in a $collection using $separator notation.

```php
Arr::remove( array|object $collection, string|array $key, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string&#124;array** |  |
| `$separator` | **string** |  |




---

### set

Set a $value in a $collection using $separator notation.

```php
Arr::set( array|object $collection, string $key, mixed $value, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$value` | **mixed** |  |
| `$separator` | **string** |  |




---

### sort

Sort a $collection by value, by a closure or by a property $sorter along a $direction

```php
Arr::sort( array|object $collection, string $direction = 'ASC', null|callable|string $sorter = null ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |
| `$sorter` | **null&#124;callable&#124;string** |  |




---

### sortKeys

Sort a $collection by keys or properties by $direction

```php
Arr::sortKeys( array|object $collection, string $direction = 'ASC' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |




---

### values

Get values from a $collection

```php
Arr::values( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

### abides

Check if $data abides an array of $rules

```php
Arr::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Arr::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Arr::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Arr::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Arr::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Arr::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Arr::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### append

Append a $value to an $array

```php
Arr::append( array $array, mixed $value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$value` | **mixed** |  |




---

### average

Get average value of an $array

```php
Arr::average( array $array, integer $decimals ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$decimals` | **integer** |  |




---

### blueprint

Build an $array from a $ruleset blueprint and fallback $defaults

```php
Arr::blueprint( array $array, array $ruleset, array $defaults = array() ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$ruleset` | **array** |  |
| `$defaults` | **array** |  |




---

### clean

Clean all falsy values from an array

```php
Arr::clean( array $array, boolean $normalize = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$normalize` | **boolean** |  |




---

### contains

Check if a $value is in an $array

```php
Arr::contains( array $array, mixed $value ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$value` | **mixed** |  |




---

### containsAll

Check if $array contains all $values

```php
Arr::containsAll( array $array, array $values ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$values` | **array** |  |




---

### containsAny

Check if $array contains any of the $values

```php
Arr::containsAny( array $array, array $values ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$values` | **array** |  |




---

### divide

Divide an $array into to arrays, the first containing the keys, the second the values

```php
Arr::divide( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### dot

Flatten a multidimensional $array with $separator notation

```php
Arr::dot( array $array, string $separator = '.', null|string $parent = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$separator` | **string** |  |
| `$parent` | **null&#124;string** |  |




---

### each

Iterate over an $array and modify the array's values via $callback function

```php
Arr::each( array $array, callable $callback, boolean $passKey = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$passKey` | **boolean** |  |




---

### filter

Find all items in an $array that pass a $callback truth test

```php
Arr::filter( array $array, callable $callback, string|integer $pass = 'value', boolean $normalize = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$pass` | **string&#124;integer** |  |
| `$normalize` | **boolean** |  |




---

### find

Find the first item in an $array that passes $callback the truth test

```php
Arr::find( array $array, callable $callback, boolean $passKey = false ): void|mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$passKey` | **boolean** |  |




---

### findAll

Find all items in an $array that passes $callback truth test

```php
Arr::findAll( array $array, callable $callback, boolean $passKey ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$passKey` | **boolean** |  |




---

### first

Get the first $number of values from an $array

```php
Arr::first( array $array, integer $number = 1 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$number` | **integer** |  |




---

### flatten

Flatten a multi-dimensional $array into a one-dimenisional array

```php
Arr::flatten( array $array, boolean $preserveKeys = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$preserveKeys` | **boolean** |  |




---

### has

Check if an $array has a $key

```php
Arr::has( array $array, integer|string $key ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$key` | **integer&#124;string** |  |




---

### hasAll

Check if an $array has all $keys

```php
Arr::hasAll( array $array, array $keys ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$keys` | **array** |  |




---

### hasAny

Check if an $array has any of the $keys

```php
Arr::hasAny( array $array, array $keys ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$keys` | **array** |  |




---

### implode

Implode an $array

```php
Arr::implode( array $array, string $glue = '' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$glue` | **string** |  |




---

### initial

Get everything from $array but the last $number of items

```php
Arr::initial( array $array, integer $number = 1 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$number` | **integer** |  |




---

### intersection

Return an array with all elements found in both $a and $b input arrays

```php
Arr::intersection( array $a, array $b ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$a` | **array** |  |
| `$b` | **array** |  |




---

### intersects

Return if $a and $b input arrays intersect or not

```php
Arr::intersects( array $a, array $b ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$a` | **array** |  |
| `$b` | **array** |  |




---

### isAssoc

Check if an $array is associative

```php
Arr::isAssoc( array $array ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### isNumeric

Check if an $array only has numeric keys

```php
Arr::isNumeric( array $array ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### isSequential

Check if $array is a numeric sequential array

```php
Arr::isSequential( array $array ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### last

Get the last $number of values from an $array

```php
Arr::last( array $array, integer $number = 1 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$number` | **integer** |  |




---

### map

Invoke a $callback function on all of the values in an $array

```php
Arr::map( array $array, callable $callback, array $arguments = array() ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$arguments` | **array** |  |




---

### mapRecursive

Invoke a  $vallbackfunction on all of the values in an $array recursively

```php
Arr::mapRecursive( array $array, callable $callback ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |




---

### matches

Check if all items in an $array match a $callback truth test

```php
Arr::matches( array $array, callable $callback ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |




---

### matchesAny

Check if any item in an $array matches a $callback truth test

```php
Arr::matchesAny( array $array, callable $callback ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |




---

### max

Get the max value of an $array

```php
Arr::max( array $array, null|callable $callback = null ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **null&#124;callable** |  |




---

### min

Get the min value of an $array

```php
Arr::min( array $array, null|callable $callback = null ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **null&#124;callable** |  |




---

### normalize

Normalize $array by sorting and filling missing keys

```php
Arr::normalize( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### prepend

Prepend an $array with a $value

```php
Arr::prepend( array $array, mixed $value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$value` | **mixed** |  |




---

### pluck

Get the value per $key from an $array of associative arrays

```php
Arr::pluck( array $array, mixed $key, boolean $preserveKeys = true, boolean $keepEmpty = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$key` | **mixed** |  |
| `$preserveKeys` | **boolean** |  |
| `$keepEmpty` | **boolean** |  |




---

### random

Get a $number of random values from an $array

```php
Arr::random( array $array, integer $number = 1 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$number` | **integer** |  |




---

### range

Generate an array from a range starting from $base to $stop by $step

```php
Arr::range( integer $base, integer $stop = null, integer $step = 1 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$base` | **integer** |  |
| `$stop` | **integer** |  |
| `$step` | **integer** |  |




---

### reject

Return all items from an $array that fail the $callback truth test

```php
Arr::reject( array $array, callable $callback, boolean $passKey = false, boolean $normalize = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$callback` | **callable** |  |
| `$passKey` | **boolean** |  |
| `$normalize` | **boolean** |  |




---

### removeFirst

Remove the first item from an $array

```php
Arr::removeFirst( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### removeLast

Remove the last item from an array

```php
Arr::removeLast( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### removeValue

Remove a $value from an $array

```php
Arr::removeValue( array $array, mixed $value, boolean $normalize = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$value` | **mixed** |  |
| `$normalize` | **boolean** |  |




---

### repeat

Fill an array with some $data a number of $times

```php
Arr::repeat( mixed $data, integer $times ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$times` | **integer** |  |




---

### replace

Replace each $search word or pattern with $replacement inside $array

```php
Arr::replace( array $array, string $search, string $replacement ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$search` | **string** |  |
| `$replacement` | **string** |  |




---

### rest

Get the last $number of items of an $array.

```php
Arr::rest( array $array, integer $number = 1 ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$number` | **integer** |  |




---

### reverse

Reverse an $array

```php
Arr::reverse( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### search

Search for the index of a value in an array.

```php
Arr::search( array $array, mixed $value ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$value` | **mixed** |  |




---

### size

Get the size of an array.

```php
Arr::size( array $array ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### undot

Unflatten a previously flattened $array using $separator notation

```php
Arr::undot( array $array, string $separator = '.' ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$separator` | **string** |  |




---

### unique

Remove duplicates from an array.

```php
Arr::unique( array $array ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |




---

### without

Return an array without all instances of certain values.

```php
Arr::without( array $array, mixed $values ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$array` | **array** |  |
| `$values` | **mixed** |  |




---

## Chain





* Full name: \Utility\Chain


### __construct

Start a new chain

```php
Chain::__construct( mixed $subject, string|object $class )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$subject` | **mixed** |  |
| `$class` | **string&#124;object** |  |




---

### break

Break the chain and return subject

```php
Chain::break(  ): mixed
```







---

### swap

Swap Utility class along the chain

```php
Chain::swap( string|object $class ): void
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$class` | **string&#124;object** |  |




---

### __call

Dispatch method calls to Utility class and pass in subject as the first argument

```php
Chain::__call( string $method, array $arguments ): void
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$method` | **string** |  |
| `$arguments` | **array** |  |




---

### start

Start a new chain

```php
Chain::start( mixed $subject, string|object $class ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$subject` | **mixed** |  |
| `$class` | **string&#124;object** |  |




---

## Collection





* Full name: \Utility\Collection
* Parent class: \Utility\Misc


### abides

Check if $data abides an array of $rules

```php
Collection::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Collection::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Collection::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Collection::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Collection::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Collection::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Collection::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### get

Get a value of a $collection by a $key of $separator notation with $default fallback

```php
Collection::get( array|object $collection, string $key = '', mixed $default = null, string $separator = '.' ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$default` | **mixed** |  |
| `$separator` | **string** |  |




---

### group

Group values from a $collection according to the results of a $callback

```php
Collection::group( array|object $collection, callable $callback ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$callback` | **callable** |  |




---

### keys

Get keys from a $collection

```php
Collection::keys( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

### remove

Remove a $key value in a $collection using $separator notation.

```php
Collection::remove( array|object $collection, string|array $key, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string&#124;array** |  |
| `$separator` | **string** |  |




---

### set

Set a $value in a $collection using $separator notation.

```php
Collection::set( array|object $collection, string $key, mixed $value, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$value` | **mixed** |  |
| `$separator` | **string** |  |




---

### sort

Sort a $collection by value, by a closure or by a property $sorter along a $direction

```php
Collection::sort( array|object $collection, string $direction = 'ASC', null|callable|string $sorter = null ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |
| `$sorter` | **null&#124;callable&#124;string** |  |




---

### sortKeys

Sort a $collection by keys or properties by $direction

```php
Collection::sortKeys( array|object $collection, string $direction = 'ASC' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |




---

### values

Get values from a $collection

```php
Collection::values( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

## Func





* Full name: \Utility\Func


### cache

Cache the return of a $function and return the value from cache in subsequent calls

```php
Func::cache( callable $function ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$function` | **callable** |  |




---

### call

Call a $function with $arguments whether it is a reference array string or an anonymus function

```php
Func::call( null|callable $function, array $arguments = array() ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$function` | **null&#124;callable** |  |
| `$arguments` | **array** |  |




---

### once

Limit a $function to be only called once

```php
Func::once( callable $function, boolean $unique = false ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$function` | **callable** |  |
| `$unique` | **boolean** |  |




---

### only

Limit a $function to be only called a certain number of $times

```php
Func::only( callable $function, integer $times = 1, boolean $unique = false ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$function` | **callable** |  |
| `$times` | **integer** |  |
| `$unique` | **boolean** |  |




---

### throttle

Throttle a $function so that it can only be called once in every $miliseconds

```php
Func::throttle( callable $function, integer $miliseconds = 300 ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$function` | **callable** |  |
| `$miliseconds` | **integer** |  |




---

## Geo





* Full name: \Utility\Geo


### address

Get lat lng data from an address

```php
Geo::address( string $address, array $apiParameters = array() ): null|string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$address` | **string** |  |
| `$apiParameters` | **array** |  |




---

### addressDistance

Calculate the distance between 2 pairs of lat and lng values

```php
Geo::addressDistance( string $address1, string $address2, array $apiParameters = array(), string $unit = 'M' ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$address1` | **string** |  |
| `$address2` | **string** |  |
| `$apiParameters` | **array** |  |
| `$unit` | **string** |  |




---

### distance

Get the distance between 2 pairs of lat and lng values in various units

```php
Geo::distance( float $lat1, float $lng1, float $lat2, float $lng2, string $unit = 'M' ): null|string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$lat1` | **float** |  |
| `$lng1` | **float** |  |
| `$lat2` | **float** |  |
| `$lng2` | **float** |  |
| `$unit` | **string** |  |




---

### getAddress

Get geo data from an address

```php
Geo::getAddress( string $address, array $apiParameters = array() )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$address` | **string** |  |
| `$apiParameters` | **array** |  |




---

### getDistance

Calculate the distance between 2 pairs of lat and lng values

```php
Geo::getDistance( float $lat1, float $lng1, float $lat2, float $lng2 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$lat1` | **float** |  |
| `$lng1` | **float** |  |
| `$lat2` | **float** |  |
| `$lng2` | **float** |  |




---

## Misc





* Full name: \Utility\Misc


### abides

Check if $data abides an array of $rules

```php
Misc::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Misc::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Misc::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Misc::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Misc::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Misc::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Misc::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

## Num





* Full name: \Utility\Num
* Parent class: \Utility\Misc


### abides

Check if $data abides an array of $rules

```php
Num::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Num::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Num::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Num::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Num::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Num::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Num::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### accord

Parse the $plural or $singular or $none template of a $number

```php
Num::accord( float $number, string $plural, string $singular, string $none = '' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$plural` | **string** |  |
| `$singular` | **string** |  |
| `$none` | **string** |  |




---

### fileSize

Get filesize from $bytes

```php
Num::fileSize( float $bytes, integer $decimals ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$bytes` | **float** |  |
| `$decimals` | **integer** |  |




---

### format

Format $number

```php
Num::format( float $number, integer $decimals, \Utility\string $decimalPoint = '.', \Utility\string $thousandSeparator = ',' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$decimals` | **integer** |  |
| `$decimalPoint` | **\Utility\string** |  |
| `$thousandSeparator` | **\Utility\string** |  |




---

### isBetween

Check if $number is between $min and $max

```php
Num::isBetween( float $number, float $min, float $max = 1 ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$min` | **float** |  |
| `$max` | **float** |  |




---

### isEven

Check if a $number is even

```php
Num::isEven( float $number ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |




---

### isNegative

Check if a $number is negative

```php
Num::isNegative( float $number ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |




---

### isOdd

Check if a $number is odd

```php
Num::isOdd( float $number ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |




---

### isOutside

Check if a $number is outside of $min and $max

```php
Num::isOutside( float $number, float $min, float $max = 1 ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$min` | **float** |  |
| `$max` | **float** |  |




---

### isPositive

Check if a $number is positive

```php
Num::isPositive( float $number, boolean $zeroIncluded = false ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$zeroIncluded` | **boolean** |  |




---

### limit

Limit $number to $min and $max values

```php
Num::limit( float $number, float $min, float $max = 1 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$min` | **float** |  |
| `$max` | **float** |  |




---

### max

Limit $number to a $max value

```php
Num::max( float $number, float $max ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$max` | **float** |  |




---

### min

Limit $number to a $min value

```php
Num::min( float $number, float $min ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$min` | **float** |  |




---

### ordinal

Get the ordinal form of a $number using a $template

```php
Num::ordinal( float $number, string $template = '%number&lt;sup&gt;%ordinal&lt;/sup&gt;' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$template` | **string** |  |




---

### pad

Pad a $number to a $length with $pad from a $direction

```php
Num::pad( float $number, integer $length, string $pad = '0', string $direction = 'left' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$length` | **integer** |  |
| `$pad` | **string** |  |
| `$direction` | **string** |  |




---

### percentOf

Check the percentage of $number relative to $normal

```php
Num::percentOf( float $number, float $normal = 100 ): float
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **float** |  |
| `$normal` | **float** |  |




---

## Obj





* Full name: \Utility\Obj
* Parent class: \Utility\Collection


### get

Get a value of a $collection by a $key of $separator notation with $default fallback

```php
Obj::get( array|object $collection, string $key = '', mixed $default = null, string $separator = '.' ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$default` | **mixed** |  |
| `$separator` | **string** |  |




---

### group

Group values from a $collection according to the results of a $callback

```php
Obj::group( array|object $collection, callable $callback ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$callback` | **callable** |  |




---

### keys

Get keys from a $collection

```php
Obj::keys( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

### remove

Remove a $key value in a $collection using $separator notation.

```php
Obj::remove( array|object $collection, string|array $key, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string&#124;array** |  |
| `$separator` | **string** |  |




---

### set

Set a $value in a $collection using $separator notation.

```php
Obj::set( array|object $collection, string $key, mixed $value, string $separator = '.' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$key` | **string** |  |
| `$value` | **mixed** |  |
| `$separator` | **string** |  |




---

### sort

Sort a $collection by value, by a closure or by a property $sorter along a $direction

```php
Obj::sort( array|object $collection, string $direction = 'ASC', null|callable|string $sorter = null ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |
| `$sorter` | **null&#124;callable&#124;string** |  |




---

### sortKeys

Sort a $collection by keys or properties by $direction

```php
Obj::sortKeys( array|object $collection, string $direction = 'ASC' ): array|object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |
| `$direction` | **string** |  |




---

### values

Get values from a $collection

```php
Obj::values( array|object $collection ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$collection` | **array&#124;object** |  |




---

### abides

Check if $data abides an array of $rules

```php
Obj::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Obj::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Obj::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Obj::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Obj::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Obj::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Obj::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### has

Check if an $object has a $key (property or method)

```php
Obj::has(  $object, string $key ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$object` | **** |  |
| `$key` | **string** |  |




---

### properties

Get all properties from an $object

```php
Obj::properties( object $object ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$object` | **object** |  |




---

### methods

Get all methods from an $object

```php
Obj::methods( object $object ): null|array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$object` | **object** |  |




---

### unpack

Unpack an $attribute from an $object

```php
Obj::unpack( object $data, null|string $attribute = null ): object
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **object** |  |
| `$attribute` | **null&#124;string** |  |




---

## Str





* Full name: \Utility\Str
* Parent class: \Utility\Misc


### abides

Check if $data abides an array of $rules

```php
Str::abides( mixed $data, array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **array&#124;callable** |  |




---

### abidesAny

Check if $data abides any of an array of $rules

```php
Str::abidesAny( mixed $data, string|array|callable $rules = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |
| `$rules` | **string&#124;array&#124;callable** |  |




---

### add

Add mixed $data to other mixed data cleverly

```php
Str::add( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dd

Dump $data and die

```php
Str::dd( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### dump

Dry dump $data for debug

```php
Str::dump( mixed $data ): void
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### merge

Merge mixed $data to other mixed data cleverly

```php
Str::merge( mixed $data ): mixed
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### getShallowType

Get a simplified type of a variable.

```php
Str::getShallowType( mixed $data ): string
```

Return values: string|array|object|number|boolean|unknown

* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$data` | **mixed** |  |




---

### accord

Get $plural or $singular string depending on $number

```php
Str::accord( string|float $number, string $plural, string $singular, string $none = '' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **string&#124;float** |  |
| `$plural` | **string** |  |
| `$singular` | **string** |  |
| `$none` | **string** |  |




---

### alpha

Convert a $string to alpha

```php
Str::alpha( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### alphaNumeric

Convert a $string to alpha numeric

```php
Str::alphaNumeric( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### append

Add $append to $string at the end

```php
Str::append( string $string, string $append ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$append` | **string** |  |




---

### ascii

Convert a $string to ASCII removing all accents

```php
Str::ascii( string $string, string $language = 'en', boolean $removeUnsupported = true ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$language` | **string** |  |
| `$removeUnsupported` | **boolean** |  |




---

### at

Get character at a specific $index from a $string

```php
Str::at( string $string, integer $index, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$index` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### base64

Base 64 encode a $string

```php
Str::base64( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### between

Get part of a $string between $start and $end substrings

```php
Str::between( string $string, string $start, string $end, integer $offset, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$start` | **string** |  |
| `$end` | **string** |  |
| `$offset` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### bool

Convert a $string to a bool

```php
Str::bool( string $string, array $trueValues = array(), array $falseValues = array() ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$trueValues` | **array** |  |
| `$falseValues` | **array** |  |




---

### camel

Convert a $string to camelCase using a specific $language

```php
Str::camel( string $string, string $language = '' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$language` | **string** |  |




---

### chars

Get all distinct characters of a $string as an array

```php
Str::chars( string $string, null|string $encoding = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### clean

Normalize and trim a $string

```php
Str::clean( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### collapse

Ensure all white space characters only appear once in a $string

```php
Str::collapse( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### common

Find a common sub string from $string and $otherString

```php
Str::common( string $string, string $otherString, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$otherString` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### commonPrefix

Find a common prefix from $string and $otherString

```php
Str::commonPrefix( string $string, string $otherString, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$otherString` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### commonSuffix

Find a common suffix from $string and $otherString

```php
Str::commonSuffix( string $string, string $otherString, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$otherString` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### contains

Check if $string contains $needle

```php
Str::contains( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### containsAll

Check if $string contains all substrings in a $needles array

```php
Str::containsAll( string $string, array $needles, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needles` | **array** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### containsAny

Check if $string contains any substrings in a $needles array

```php
Str::containsAny( string $string, array $needles, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needles` | **array** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### count

Count the characters in $string

```php
Str::count( string $string, null|string $encoding = null ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### dashed

Delimit $string with dashes instead of spaces

```php
Str::dashed( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### delimit

Connect words with $delimiter instead of spaces in $string

```php
Str::delimit( string $string, string $delimiter, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$delimiter` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### endsWith

Check if $string ends with $needle

```php
Str::endsWith( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### endsWithAny

Check if $string ends with any of the $needles

```php
Str::endsWithAny( string $string, array $needles, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needles` | **array** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### ensureLeft

Esnure $string starts with $ensure

```php
Str::ensureLeft( string $string, string $ensure ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$ensure` | **string** |  |




---

### ensureRight

Ensure $string ends with $ensure

```php
Str::ensureRight( string $string, string $ensure ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$ensure` | **string** |  |




---

### fileSize

Return a formatted filesize from $bytes

```php
Str::fileSize( float|string $bytes, integer $decimals ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$bytes` | **float&#124;string** |  |
| `$decimals` | **integer** |  |




---

### first

Get first $number characters from $string

```php
Str::first( string $string, integer $number = 1, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$number` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### htmlDecode

HTML decode $string

```php
Str::htmlDecode( string $string, string $flags = ENT_COMPAT, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$flags` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### htmlEncode

HTML encode $string

```php
Str::htmlEncode( string $string, string $flags = ENT_COMPAT, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$flags` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### index

Get position of $needle within $string

```php
Str::index( string $string, string $needle, integer $offset, null|string $encoding = null ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$offset` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### indexes

Get all positions of $needle within $string

```php
Str::indexes( string $string, string $needle, null|string $encoding = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### insert

Push $insert into $string at the $index character

```php
Str::insert( string $string, string $insert, integer $index, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$insert` | **string** |  |
| `$index` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### isAlpha

Check if $string is alfa

```php
Str::isAlpha( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isAlphanumeric

Check if $string is alfa numeric

```php
Str::isAlphanumeric( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isBase64

Check if $string is base 64 encoded

```php
Str::isBase64( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isBlank

Check if $string is empty or has only white space

```php
Str::isBlank( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isEmail

Check if $string is a valid email

```php
Str::isEmail( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isHexadecimal

Check if $string is hexadecimal

```php
Str::isHexadecimal( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isHTML

Check if $string contains HTML code

```php
Str::isHTML( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isIP

Check if $string is a valid IP address

```php
Str::isIP( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isJSON

Check if $string is valid JSON

```php
Str::isJSON( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isLower

Check if $string is lower-case

```php
Str::isLower( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isRegex

Check if $string is a valid regex

```php
Str::isRegex( string $pattern ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$pattern` | **string** |  |




---

### isSerialized

Check if $string is serialized

```php
Str::isSerialized( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isUpper

Check if $string is upper case

```php
Str::isUpper( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### isURL

Check if $string is a valid URL

```php
Str::isURL( string $string ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### last

Get the last $number characters of a $string

```php
Str::last( string $string, integer $number = 1, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$number` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### lastIndex

Get last position of $needle in $string

```php
Str::lastIndex( string $string, string $needle, integer $offset, null|string $encoding = null ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$offset` | **integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### length

Count length of $string

```php
Str::length( string $string, null|string $encoding = null ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### limit

Safely truncate $string in $length

```php
Str::limit( string $string, integer $length, string $append = '...', null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$append` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### limitWords

Limit $string to a $limit of words

```php
Str::limitWords( string $string, integer $length, \Utility\string $append = '...' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$append` | **\Utility\string** |  |




---

### lines

Get an array of lines in $string

```php
Str::lines( string $string, boolean $trimEachLine = false ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$trimEachLine` | **boolean** |  |




---

### lower

Convert $string to lower case

```php
Str::lower( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### lowerFirst

Convert the first character of each word in $string to lower case

```php
Str::lowerFirst( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### matches

Check if $string matches $pattern

```php
Str::matches( string $string, string $pattern ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$pattern` | **string** |  |




---

### normalize

Convert punctuation characters to a standardised, simpler version

```php
Str::normalize( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### ordinal

Get ordinal version of $number according to $template

```php
Str::ordinal( string|float $number, string $template = '%number&lt;sup&gt;%ordinal&lt;/sup&gt;' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$number` | **string&#124;float** |  |
| `$template` | **string** |  |




---

### pad

Add $pad to $string until it reaches $length

```php
Str::pad( string $string, integer $length, string $pad = ' ', string $direction = 'right', null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$pad` | **string** |  |
| `$direction` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### padBoth

Add $pad to both ends of a $string until it reaches $length

```php
Str::padBoth( string $string, integer $length, string $pad = ' ', null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$pad` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### padLeft

Add $pad to the left side of a $string until it reaches $length

```php
Str::padLeft( string $string, integer $length, string $pad = ' ', null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$pad` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### padRight

Add $pad to the right side of a $string until it reaches $length

```php
Str::padRight( string $string, integer $length, string $pad = ' ', null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$length` | **integer** |  |
| `$pad` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### pascal

Convert $string to PascalCase

```php
Str::pascal( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### prepend

Add $prepend at the beginning of $string

```php
Str::prepend( string $string, string $prepend ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$prepend` | **string** |  |




---

### random

Generate random or $readable random string of $length

```php
Str::random( integer $length = 10, boolean $readable = true ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$length` | **integer** |  |
| `$readable` | **boolean** |  |




---

### regexReplace

Replace $pattern with $replacement in $string

```php
Str::regexReplace( string $string, string|array $pattern, string|array $replacement ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$pattern` | **string&#124;array** |  |
| `$replacement` | **string&#124;array** |  |




---

### remove

Remove $search pattern from $string

```php
Str::remove( string $string, string $search ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$search` | **string** |  |




---

### removeLeft

Remove $needle from the beginning of $string

```php
Str::removeLeft( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### removeRight

Remove $needle from the end of $string

```php
Str::removeRight( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### repeat

Repeat $string $times

```php
Str::repeat( string $string, \Utility\int $times ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$times` | **\Utility\int** |  |




---

### replace

Replace $search string with $replacement in $string

```php
Str::replace( string $string, string $search, string $replacement ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$search` | **string** |  |
| `$replacement` | **string** |  |




---

### reverse

Reverse the characters of $string

```php
Str::reverse( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### shuffle

Randomly shuffle the characters of $string

```php
Str::shuffle( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### slice

Cut $string from $start to $end

```php
Str::slice( string $string, integer $start, null|integer $end = null, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$start` | **integer** |  |
| `$end` | **null&#124;integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### slug

Convert $string to slug-case

```php
Str::slug( string $string, string $language = 'en' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$language` | **string** |  |




---

### slugify

Remove special characters and change whitespace characters with $delimiter in $string

```php
Str::slugify( string $string, string $delimiter = '-', string $language = 'en' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$delimiter` | **string** |  |
| `$language` | **string** |  |




---

### snake

Convert $string to snake_case

```php
Str::snake( string $string, string $language = 'en' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$language` | **string** |  |




---

### spacesToTabs

Convert spaces to tabs in $string

```php
Str::spacesToTabs( string $string, integer $tabLength = 4 ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$tabLength` | **integer** |  |




---

### split

Split $string at $pattern

```php
Str::split( string $string, string $pattern = '', null|integer $limit = null ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$pattern` | **string** |  |
| `$limit` | **null&#124;integer** |  |




---

### startsWith

Check if $string starts with $needle

```php
Str::startsWith( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### startsWithAny

Check if $string starts with any $needles

```php
Str::startsWithAny( string $string, array $needles, boolean $caseSensitive = false, null|string $encoding = null ): boolean
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needles` | **array** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### stringReplace

Swap $search with $replacement in $string

```php
Str::stringReplace( string $string, string $search, string $replacement ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$search` | **string** |  |
| `$replacement` | **string** |  |




---

### stripWhitespace

Remove all white space characters from $string

```php
Str::stripWhitespace( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### sub

Cut $string from $start to a certain $length

```php
Str::sub( string $string, integer $start, null|integer $length = null, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$start` | **integer** |  |
| `$length` | **null&#124;integer** |  |
| `$encoding` | **null&#124;string** |  |




---

### tabsToSpaces

Convert tabs to spaces in $string

```php
Str::tabsToSpaces( string $string,  $tabLength = 4 ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$tabLength` | **** |  |




---

### template

Replace template variables in $string according to associate $data array

```php
Str::template( string $string, array $data = array(), string $varSymbol = '%' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$data` | **array** |  |
| `$varSymbol` | **string** |  |




---

### timesContains

Count how many times $string contains $needle

```php
Str::timesContains( string $string, string $needle, boolean $caseSensitive = false, null|string $encoding = null ): integer
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$needle` | **string** |  |
| `$caseSensitive` | **boolean** |  |
| `$encoding` | **null&#124;string** |  |




---

### title

Convert $string to Title Case

```php
Str::title( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### titlize

Convert $string to Title Case with an $ignore list of words that would not be converted to uppercase

```php
Str::titlize( string $string, array $ignore = array(), null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$ignore` | **array** |  |
| `$encoding` | **null&#124;string** |  |




---

### trim

Trim $characters from each end of a $string

```php
Str::trim( string $string, string $characters = ' ' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$characters` | **string** |  |




---

### trimLeft

Trim $characters from the left side of $string

```php
Str::trimLeft( string $string, string $characters = ' ' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$characters` | **string** |  |




---

### trimRight

Trim $characters from the right side of $string

```php
Str::trimRight( string $string, string $characters = ' ' ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$characters` | **string** |  |




---

### underscored

Replace spaces with _ (underscores) in $string

```php
Str::underscored( string $string ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |




---

### upper

Convert string to UPPER CASE

```php
Str::upper( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### upperFirst

Upper Case first character of each word in $string

```php
Str::upperFirst( string $string, null|string $encoding = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$encoding` | **null&#124;string** |  |




---

### words

Get an array of words from $string

```php
Str::words( string $string, boolean $unique = true ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **string** |  |
| `$unique` | **boolean** |  |




---

## URL





* Full name: \Utility\URL


### auth

Add $user and $pass to a $url

```php
URL::auth( null|string|array $url, string $user, null|string $pass = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$user` | **string** |  |
| `$pass` | **null&#124;string** |  |




---

### build

Build a URL from a parsed array

```php
URL::build( array $url ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **array** |  |




---

### current

Get the current URL or its $parts

```php
URL::current( array $parts = array() ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$parts` | **array** |  |




---

### fragment

Get or $set the fragment of a $url

```php
URL::fragment( null|string|array $url, null|string $set = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **null&#124;string** |  |




---

### fragmentSet

Set $fragment part of a $url

```php
URL::fragmentSet( null|string|array $url, string $fragment ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$fragment` | **string** |  |




---

### host

Get or $set the host of a $url

```php
URL::host( null|string|array $url, null|string $set = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **null&#124;string** |  |




---

### hostSet

Set $host part of a $url

```php
URL::hostSet( null|string|array $url, string $host ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$host` | **string** |  |




---

### parse

Consistently parse $url

```php
URL::parse( string $url ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **string** |  |




---

### parts

Get $parts of a $url

```php
URL::parts( null|string|array $url,  $parts = array('scheme', 'host', 'path') ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$parts` | **** |  |




---

### pass

Get the pass part of a $url

```php
URL::pass( null|string|array $url ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |




---

### path

Get or $set the path of a $url

```php
URL::path( null|string|array $url, null|string $set = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **null&#124;string** |  |




---

### pathRemove

Remove $search string or pattern from $url path

```php
URL::pathRemove( null|string|array $url, \Utility\string $search ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$search` | **\Utility\string** |  |




---

### pathSet

Set $path part of a $url

```php
URL::pathSet( null|string|array $url, null|string $path ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$path` | **null&#124;string** |  |




---

### port

Get or $set the port of a $url

```php
URL::port( null|string|array $url, boolean $set = false ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **boolean** |  |




---

### portSet

Set $port part of a $url

```php
URL::portSet( null|string|array $url, string|integer $port ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$port` | **string&#124;integer** |  |




---

### query

Get or $set the query of a $url

```php
URL::query( null|string|array $url, boolean $set = false ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **boolean** |  |




---

### queryAdd

Add a parameter $key and $value to the query of the $url

```php
URL::queryAdd( null|string|array $url, string $key, mixed $value ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$key` | **string** |  |
| `$value` | **mixed** |  |




---

### queryArray

Get the array of query args from a $url

```php
URL::queryArray( null|string|array $url ): array
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |




---

### queryGet

Get a query parameter from a URL

```php
URL::queryGet( null|string|array $url, string $parameter ): string|null
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$parameter` | **string** |  |




---

### queryRemove

Remove a parameter by $key from the query of the $url

```php
URL::queryRemove( null|string|array $url,  $keys ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$keys` | **** |  |




---

### querySet

Set the $url path part to $data

```php
URL::querySet( null|string|array $url, string|array $data ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$data` | **string&#124;array** |  |




---

### scheme

Get or $set the scheme of a $url

```php
URL::scheme( null|string|array $url, null|string $set = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **null&#124;string** |  |




---

### schemeSet

Set $scheme part of a $url

```php
URL::schemeSet( null|string|array $url, null|string $scheme ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$scheme` | **null&#124;string** |  |




---

### user

Get the user part of a $url

```php
URL::user( null|string|array $url, null|string $set = null ): string
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$url` | **null&#124;string&#124;array** |  |
| `$set` | **null&#124;string** |  |




---



--------
> This document was automatically generated from source code comments on 2019-08-07 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
