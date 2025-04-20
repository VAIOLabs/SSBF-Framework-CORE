# WIKI

# Technical documentation
~~~~
SSBF Framework 2.0
~~~~

###

 

 Modules:
 
 - Dynamic font-size
 - Dynamic font-color
 - Dynamic background-color
 - Dynamic width
 - Dynamic height
 - Dynamic margin
 - Static css lib
 - NormalizeCSS lib
 - Template  loader

## Dynamic font size
   ``````
    <p class="fs-size(in px)"></p>
   ``````
Example:
```
<p class="fs-16"></p>
```

------

## Dynamic font color
   ``````
    <p class="c-(color in HEX format after #)"></p>
   ``````
Example:
```
<p class="c-fffff"></p>
```
------

## Dynamic background color
   ``````
    <div class="bc-(color in HEX format after #)"></div>
   ``````
Example:
```
<p class="bc-fffff"></p>
```

------

## Dynamic width
   ``````
    <div class="w-width(in px)"></div>
   ``````
Example:
```
<div class="w-100"></div>
```
------

## Dynamic height
   ``````
    <div class="h-height(in px)"></div>
   ``````
Example:
```
<div class="h-100"></div>
```
------

## Dynamic margin 
   ``````
    <div class="m-margin(in pd)"></div>
   ``````
Example:
```
<div class="m-100"></div>
```
------

## Static css lib 
   ``````
<lib static="true"></lib>
   ``````
True when you have predefined margins, colors itd.
   ``````
<lib static="false"></lib>
   ``````
Or false when you don't have this features

------
## NormalizeCSS Lib
```
<normalize css="true"></normalize>
```
Set true when you have reset all internet browser styles 
```
<normalize css="false"></normalize>
```
Set false when you haven't reset all internet browser styles 

------
## Template loader

Templates location is /templates/ main template html file is ,,index.html" this file must include html and css code for a template 

#### **How to place variables in template?**
```
<h1>{{variable}}</h1>
```
#### **How to load template?**
You must paste this code and configure all variables which you set in the template 
```
<template id="templateid">
  {
    "variable": "0",
    "variable1": "1"
  }
</template>
```
When you set variables in this block you must paste this code for load template 
```
<div data-template="templatename(template folder name)" data-instance-id="templateid(from first element)"></div>
```
 When you complete all steps your template is visible on the site

Example:

Load template 
```
<template id="hero">
  {
    "title": "Hero",
    "subtitle": "SSBF - Simple Site Build Framework",
    "link": "#about",
    "button-text": "Button"

  }
</template>
```
Place template in code

```
  <div data-template="hero" data-instance-id="hero"></div>
```


