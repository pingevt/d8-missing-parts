autoscale: true
build-lists: true
slidenumbers: true

# Drupal 8 - The missing Parts

---
# Who am I?

## Pete Inge

###Senior Developer, Bluecadet

pinge@bluecadet.com

^ Experience
Current
Contact for more info

---

# What we’ll cover

- Grabbag of ideas and methodologies

^ Not as much exact code but more ideas you can hopefully google later and learn more in depth.

---

# Who is this for?

^ Get “Site Builders” into code
Beginner Code monkeys
Developers who want to improve the Admin or config side of Drupal
Anyone interested in trying to take their work to the next level

---

# Where I'm coming from (What drives me to do what i do)

- Customization is key to taking your site to the next level
- Drupal is very data centric, but can be very confusing to Content Authors

---

# Where I'm coming from (What drives me to do what i do)

- Let’s try to do it closer to the “Drupal” way (“In Drupal there are 10 ways to do something and 5 of them are correct”)
  - By doing it the “Drupal way”, makes it easier to debug
  - Mental checklist of what to look at when debugging


---

# Where I'm coming from (What drives me to do what i do)

- We should always be thinking about the next developer.

^ I look at my own code that is 6 months old, and usually can’t believe how or why I did what I did. This is due to a number of factors, typically revolving around time. Just think how crazy it may look to someone else.

---

# Data-centric appoach

^ Data centric appoach: With a CMS we really deal with Data first. We transform the data for what we need, then present it to our audience.

  So Lets dive in!

---

[.footer: https://www.drupal.org/docs/8/creating-custom-modules/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-module]

##Libraries

Adding stylesheets and JS to your sites.

^ I won't spend too much time on this, but this is the way in D8 to add your custom JS and CSS to your site.
What is nice is you can define multiple libraries so you only add what you need for certain elements.

Example: We have multi value fields we use as slide shows. We use flickity for our slideshows. So we have the default flickity JS and CSS and then we have our own custom JS and CSS all included in a library on our theme. We attach this library to the field render array and these files are only loaded when needed.

---

##Preprocess/Alter Functions

- They are all over the place
- A lot of customization and logic
- I often bury a lot of code here that can be done other ways, but easier here.
- Remove logic from template files
  - Templates should be for presentation, not logic

- Examples:
  - Links with icons added in
  - Add custom dynamic markup

---

##Display Formatters

^

---

##Services

^

---

##Tokens

^

---

#Content
and helping your site Authors

^

---

##Options Fields

^

---

##Form States

^ (Contextual Fields in D7)

---

##Custom Blocks etc

^

---

##Settings Pages
and preprocess!

^

---

##CKEditor Plugins

^

---

##Custom Batch Processes

- Migration
- Prebuild Images

^

---

# Custom Code vs. Contrib Module

^

