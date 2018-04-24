autoscale: true
build-lists: true
slidenumbers: true

# Drupal 8 - The missing Parts

---
# Who am I?

##<br>

## Pete Inge

###Senior Developer, Bluecadet

pinge@bluecadet.com
https://github.com/pingevt/d8-missing-parts

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
####Adding stylesheets and JS to your sites

- Include custom CSS/JS for specific elements
- Helps with optimizations, file size etc.


^ I won't spend too much time on this, but this is the way in D8 to add your custom JS and CSS to your site.
What is nice is you can define multiple libraries so you only add what you need for certain elements.
Example: We have multi value fields we use as slide shows. We use flickity for our slideshows. So we have the default flickity JS and CSS and then we have our own custom JS and CSS all included in a library on our theme. We attach this library to the field render array and these files are only loaded when needed.

---

##Preprocess/Alter Functions

![right fit](images/preprocess_node.png)

- They are all over the place
- A lot of customization and logic
- I often bury a lot of code here that can be done other ways, but easier here.
- Remove logic from template files
  - Templates should be for presentation, not logic

^

---

##Preprocess/Alter Functions (con't)

- Examples:
  - Links with icons added in
  - 'Override' fields
  - Add custom dynamic markup

---

##Display Formatters

![right fit](images/display_formatters.png)

- What is a Display Formatter?

^ What is a Display formatter?
In essence,
its taking our data,
manipulating it,
and then creating new data to theme (Sometimes done together)

^ Example: Link Field

---

##Display Formatters (con't)

![right fit](images/display_formatters.png)

- Why use a Display Formatter?
  - It's the "Drupal" Way
  - Re-usability
  - Debugging

^It's the "Drupal" Way: non-coders can see this in the GUI
Re-usability: use accross multiple fields and potentially field types
Debugging: Typical thing to look for when debugging

---

##Display Formatters (con't)

![right fit](images/display_formatter_code.png)

Re-use and learn from core modules

^A lot of times I just want to tweak one small thing, extend from core
Copy cores and modify to your heart’s content
Most of this could be done in a preprocess, but now I don’t have to code it for every use case, just set it in the display formatter and it should work.

^Examples:
IVC - Accessibility Fields
IVC - Pricing (simple)
Mann - Viewsreference Preview (more complex)


---

[.footer: https://www.drupal.org/docs/8/api/services-and-dependency-injection/services-and-dependency-injection-in-drupal-8]
##Services
<br>
###What is a Service
- In Drupal 8 speak, a service is any object managed by the services container.

ANALOGY???

^ What? That explains a whole lot. If you re-use code, or doing the same thing over and over, look at using a service.

---

##Tokens

![right fit](images/tokens.png)

^ Create your own to expose data in an unlimited way

---

##Tokens (con't)

```php
/**
 * Implements hook_token_info().
 */
function hook_token_info() {
  // Define your token.
}

/**
 * Implements hook_tokens().
 */
function hook_tokens($type, $tokens,
array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  // Code to replace your tokens
}
```

^Examples:
Path aliases
Meta Tags (A lot)
“Override” fields (Display title)


---

#Content
and helping your site Authors

^We now have few more things in our tool belt. Lets talk about some specifics and how we combine some of this.

---

##Options Fields
and preprocess!

<br>
- Basically, fields that define layout/content, but don't actually show on the FE

^We use these mainly with Paragraphs to accomodate an easier admin solution.

---

##Options Fields Ex.

![inline ](images/mann_paragraphs_fe.png)

^

---

##Options Fields Ex.

![right fit](images/mann_paragraphs_be.png)

- define color theme
- define Image alignment
- define Image shape
- define background shape (hidden|circle|square)
- define background message

^Allow for an easier author experience
There is one place to add content, and then can tweak settings

---

##Settings Pages
and preprocess!

^ This extends what we just talked aout one step further.

---

##Settings Pages

![right fit](images/yanni_cropped.png)

- Most content here was global (but editable)
- Most content was allowed/disallowed for an event
- These were simple bools, and I didn't want to bake into field config

^Keeps content out of configuration (save as Drupal state)
Content Authors have the ability to manage things at a global level rather than having to update content in numerous places
Potentially could be blocks or something similar, but I believe this is much simpler implementation

---

##Form States

![inline ](vid/states.mov)

^ Think (Contextual Fields in D7)

---

##Form States (con't)

- Clean up your forms


^ Think (Contextual Fields in D7)

---

##Custom Blocks etc

^

---

##CKEditor Plugins

- Clients always want more functionality in the WYSIWYG
  - Our typical response is NO
  - but really?
- Con: have to learn new system

- Overall improves Admin experience

^ Our typical response is NO

---

##CKEditor Plugins (ex)

![inline fit](images/ckeditor.png)

^ We had this design pattern we didn't know how to implement.
Great pattern for a typical boring page.

---

##Custom Batch Processes

- Migration
- Prebuild Images

^

---

# Custom Code vs. Contrib Module

^

