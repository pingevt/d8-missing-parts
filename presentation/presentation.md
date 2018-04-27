autoscale: true
build-lists: true
slidenumbers: false
footer: Pete Inge | Bluecadet | D8: the Missing Parts

# Drupal 8 - The missing Parts

^ * Be the Story Teller
* Breathe

---

# Who am I?

##<br>

## Pete Inge

###Senior Developer, Bluecadet

pinge@bluecadet.com
https://github.com/pingevt/d8-missing-parts

![right 90%](images/logo.gif)

^ Experience: ~10yrs freelance in web dev
Worked in D5-D8
Current: @ BC for 2.5 years
I'm a problem solver
Contact for more info

---

#Bluecadet
![fit](images/bc.jpg)

^Established in 2007, Bluecadet is an Emmy Award-winning digital agency that creates world-class websites, mobile apps, interactive installations, and immersive environments. We collaborate with leading museums, cultural institutions, universities, progressive brands, and nonprofit organizations to educate, engage, and entertain.

^ Bluecadet is an experience design agency. We partner with mission-driven organizations to create a broad suite of products and environments. We embrace design, technology, and innovation in the service of content, emotion, and experience. We create experiences that engage audiences through increased knowledge, empathy, and action.

---

# Who is this for?

- Anyone interested in getting better at Drupal
- "Site Builders"
- Themers
- Beginner Coders

^- Anyone interested in trying to take their work to the next level
- Get “Site Builders” into code
- Themers
- Beginner Code
- Developers who want to improve the Admin or config side of Drupal
- Anyone interested in trying to take their work to the next level

---

# What we’ll cover

- Grabbag of ideas
- methodologies
- and hopefully some best practices

^ Not as much exact code but more ideas you can hopefully google later and learn more in depth.
- I do have some links if you download this presentation.

---

# What we’ll cover

1 Data
  - Libraries
  - Preprocess
  - Display Formatters
  - Services
  - Tokens

---

# What we’ll cover

2 Content
  - Form States
  - Option Fields
  - Settings Pages
  - CKeditor Plugins
  - Batch Processes
  - Honorable Mentions

---

# \Drupal\MyWay->config();

- Customization is key to taking your site to the next level
- Drupal is very data centric, and can be very confusing to Content Authors

---

# \Drupal\MyWay->config();

- Let’s try to do it closer to the “Drupal” way
- “In Drupal there are 10 ways to do something and 5 of them are correct”

  - By doing it the “Drupal way”, makes it easier to debug
  - Mental checklist of what to look at when debugging

^ I believe Drupal 8 has gottten better, but still...

---

# \Drupal\MyWay->config();

- We should always be thinking about the next developer.

^ I look at my own code that is 6 months old, and usually can’t believe how or why I did what I did. This is due to a number of factors, typically revolving around time. Just think how crazy it may look to someone else.

---

# [fit] 1 Data

---

# 1 Data

- Input Raw Data
- Transform the Data
- Present to our Audience (html/css/js)

^ Data centric appoach:
- With a CMS we really deal with Data first.
- We transform the data for what we need,
- then present it to our audience.
<br >
So Lets dive in!

---

# [fit] Libraries

---

#Libraries

Adding stylesheets and JS to your sites

![right fit](images/libraries.png)

- Include custom CSS/JS for specific elements
- Helps with optimizations, file size etc.


^ I won't spend too much time on this, but this is the way in D8 to add your custom JS and CSS to your site.
- What is nice is you can define multiple libraries so you only add what you need for certain elements.

---

#Libraries (ex)

![inline ](vid/flickity.mov)

^
Example: We have multi value fields we use as slide shows. We use flickity for our slideshows. So we have the default flickity JS and CSS and then we have our own custom JS and CSS all included in a library on our theme. We attach this library to the field render array and these files are only loaded when needed.

---

## [fit] Preprocess/
## [fit] Alter
## [fit] Functions

---

[.footer: https://api.drupal.org/api/drupal/core!core.api.php/group/hooks/8.2.x]

##Preprocess/Alter Functions

- Hooks are specially-named functions that a module defines (this is known as "implementing the hook"), which are discovered and called at specific times to alter or add to the base behavior or data (this is known as "invoking the hook").

^ What is a hook?

---

##Preprocess/Alter Functions

![right fit](images/preprocess_node.png)

- They are all over the place, anything you can theme
- A lot of customization and logic
- I often bury a lot of code here that can be done other ways, but easier here.
- Remove logic from template files
  - Templates should be for presentation, not logic

^Difference between preprocess and alter funcs:
- alters you are typically altering data structures
- preprocess you are typically creating or modifying variables to use in templates

---

##Preprocess/Alter Functions (ex)

Examples

![right fit](images/links_w_icon.png)

- Links with icons added in
- 'Override' fields
- Add custom dynamic markup

^ Quick basic examples for beginners...
- Mann
- Short Title
- Insert google maps
<br >
Let's get another Step deeper...

---

## [fit] Display
## [fit] Formatters

---

##Display Formatters

![right fit](images/display_formatters.png)

What is a Display Formatter?

^ What is a Display formatter?
In essence,
its taking our field data,
manipulating it,
and then creating the rendered mark up

^ Example: Link Field
- field includes url, link text, target
- Default display as link or seperate link and text

---

##Display Formatters

![right fit](images/display_formatters.png)

Why use a Display Formatter?

- It's the "Drupal" Way
- Re-usability
- Debugging

^-It's the "Drupal" Way: non-coders can see this in the GUI
- Drupal's flow
- Re-usability: use across multiple fields
- Let's think, Preprocessors => One-off vs Display Formatters => Re-usability
- Debugging: Typical thing to look for when debugging

---

##Display Formatters

![right fit](images/display_formatter_code.png)

Re-use and learn from core modules

^- A lot of times I just want to tweak one small thing, extend from core
- Copy cores and modify to your heart’s content
- *And we do have display formatter Settings

---

##Display Formatters (ex)

![right fit](images/display_formatter_code.png)

![left inline](images/bool3.png)

^Examples:
12 Accessibility Fields
Alt, logic in a preprocess, interupt drupal flow...
<br>
Time to get a lot more complicated

---

## [Fit] Services

---

##Services

What is a Service

- In Drupal 8 speak, a service is any object managed by the services container.
- OOP for the win!

^ What? That explains a whole lot. If you re-use code, or doing the same thing over and over, look at using a service.
Basically going to create a class to re-use your code. OOP for the win!
<br>
That was a little abstract, lets move on to something more tangible

---

##Services

Smoothie Maker

![right](images/russell-hobbs-mix-go-steel-blender-smoothie-maker-300.jpg)

^You put a bunch of ingredients in,

---

##Services (ex)

- Taxonomy Terms with icons

![right ](images/services_ex.png)

---

## [fit] Tokens

---

##Tokens

![right fit](images/tokens.png)

- Expose your data however you want to
- REALLY Easy

^ Create your own to expose data in an unlimited way
REALLY Easy
Metatags and URL aliases are probably most common.

---

##Tokens

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
When you data gets complex, tokens can help simplify

---

#[fit] 2 Content

---

#2 Content
and helping your site Authors

^We have now added a few more things in our tool belt to alter our data. Lets talk about some specific methodology and how we combine these tools.
<br>
Let's start with something simple...

---

## [fit] Form
## [fit] States

---

##Form States

- Clean up your forms
- Lead content Authors through the data

^ Think (Contextual Fields in D7)

---

##Form States (ex)

![inline ](vid/states.mov)

^ T it up video

---

## [fit] Options
## [fit] Fields

---

##Options Fields
and preprocess!

<br>

- Basically, fields that define layout/content, but don't actually show on the FE

^We use these mainly with Paragraphs to accomodate an easier admin solution.
- PP LEGO Bricks example. Many types/colors of bricks, can be combined in diffrent ways.

---

##Options Fields (ex)

![inline ](images/mann_paragraphs_fe.png)

^Presented with these designs. Looked for commonality

---

##Options Fields (ex)

![right fit](images/mann_paragraphs_be.png)

- define color theme
- define Image alignment
- define Image shape
- define background shape (hidden|circle|square)
- define background message

^Allow for an easier author experience
There is one place to add content, and then can tweak settings
I have done it and I've seen it done where these would all be different para bundles
96 options to display this...
<br>
*Going back to data centric, your forms don't have to exactly mimic your FE design/experience.
<br>
One more step further...

---

## [fit] Settings
## [fit] Pages

---

##Settings Pages
and preprocess!

^ We now extrapolate that further...
What we previously did was on the paragraph (node) level

---

##Settings Pages

![right fit](images/yanni_cropped.png)

- Most content here was global (but editable)
- Most content was allowed/disallowed for an event
- These were simple bools, and I didn't want to bake into field config

^Context: Event Detail page telling attendees what they can expect at the show. Different types of shows allow different things.
<br>
- Content Authors have the ability to manage things at a global level rather than having to update content in numerous places
- ??
- Keeps content out of configuration (save as Drupal state)
<br>
ex. Picinics...
<br>
Potentially could be blocks or something similar, but I believe this is much simpler implementation

---

##Settings Pages (ex)

![inline fit](images/event_fields.png)

---

## [fit] CKEditor
## [fit] Plugins

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

![right fit](images/bg_design.png)

^ We had this design pattern we didn't know how to implement.
Great pattern for a typical boring page.

---

##CKEditor Plugins (ex)

![original fit](images/btn.png)

![original fit](images/popup.png)

^ We had this design pattern we didn't know how to implement.
Great pattern for a typical boring page.

---

## [fit] Batch
## [fit] Processes

---

##Custom Batch Processes

What is a batch Process?

- Functions allowing forms processing to be spread out over several page requests, thus ensuring that the processing does not get interrupted because of a PHP timeout, while allowing the user to receive feedback on the progress of the ongoing operations. - api.drupal.org

---

##Custom Batch Processes (ex)

![right](images/batch.png)

- Simple Migrations or content updates
- Prebuild Image styles (or whatever assets) for something else (headless)
- combine with cron jobs to run large tasks as needed

^Typically used in Dev, for "quick updates"
NASM: updating collections

---

#Honorable Mentions:

- Build your own Blocks
- Build your own Forms
- Cron Jobs

---

# [fit] Custom Code
# [fit] vs.
# [fit] Contrib Module

---

# Custom Code vs. Contrib Module

- Pros
  - Simplify everything (code/config)
  - Potentially reduce extraneous for content authors

^Sometimes a module just has too many options/config/settings. Do it yourself, but be careful.

---

# Custom Code vs. Contrib Module

- Cons
  - Updates/Maintenance
  - Do you really know enough to do it yourself?

---

## Custom Code vs. Contrib Module (Ex)

### Save & Edit module

- Creates a "Save & Edit" button on node pages
- Provides a number of options to configure that

<br>

- Overall great module :thumbsup:

^What is it?

---

## Custom Code vs. Contrib Module (Ex)

### Save & Edit module

- Adds 2 permissions
- Adds 1 config file
- 11 files to the module

<br>

- Prob 20-30 lines or less of custom code

^I had it enabled and working fine so I kept it.

---

Links:

https://www.drupal.org/docs/8/creating-custom-modules/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-module
https://www.drupal.org/docs/8/api/services-and-dependency-injection/services-and-dependency-injection-in-drupal-8
https://api.drupal.org/api/drupal/core!core.api.php/group/extending/8.2.x
https://www.drupal.org/docs/8/creating-custom-modules
https://api.drupal.org/api/drupal/core%21includes%21form.inc/group/batch/8.2.x
https://www.drupal.org/docs/8/api/state-api/overview

---

#Thanks!
###Questions?

---

#Bluecadet

![right](images/bc_workspace.jpg)
![left](images/bluecadet-nasm-website.jpg)

---