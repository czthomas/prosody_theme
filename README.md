### Development Environment

- Developed locally with MAMP 3.2.1 running PHP 5.6.7, node 0.12.7, npm 2.12.1

### Dependencies

- npm: gulp, gulp-stylus, autoprefixer-stylus

### Gulp tasks

- `gulp stylus` will generate css files for any stylus files in css/. It will also run the stylus through autoprefixer.
- `gulp` will run gulp stylus, then watch for any changes to stylus files and regenerate css.

### Things to know

- Prosody follows the standard WordPress templating heirarchy. There is some reduplication between index.php and single-prosody_poem.php. The former controls the home page, which should display the one poem with the category "featured", while the latter controls the appearance of all other single poem pages.
- Uses custom build of bootstrap css that just includes grid and responsive functions. This is located in css/ along with all other css.
- There are two main stylesheets: screen.css and poem.css. Poem.css deals specifically with all elements involved in the display of the poem, such as the rhymebar and the check buttons for each line. This effectively covers everything that was in an iframe in the previous iteration of Prosody. Screen.css covers everything else in the site.
- In order for the poems to show up, you must set WP Permalinks to Postname (i.e., pretty permalinks) in the WP settings.
- There are two static pages in the site: Glossary and Instructions. To create these, create a new page, add the appropriate title, then copy in the content from either glossary_text.html or instructions_text.html. This should be copied into the "text" tab of the editor.
- In WP Settings/Writing, make sure that "Wordpress should correct invalidly nested XHTML automatically" is *not* checked. If it is checked, WP will strip out breaks that are necessary for proper display of the poems and rhymebar inputs.

### Upload process

- Prosody requires both the Prosody theme and the Prosody plugin. Both must be activated.
- In Prosody, every poem is an instance of the prosody_poem custom post type. To add a poem, either in the Dashboard or through the admin bar that floats at the top of the page when signed in, create a new Poem.
- Fill in the title, then skip down to the "Original Document" field. Paste the xml for the poem in this field. When you save or publish the poem, it will automatically generate the post content for the poem.
- Fill in the "Author," "Difficulty," and "Type" fields.
- If the poem has any resources associated with it, add them in the "Resources" field. For media files, use the built-in "Add Media" button of the WYSIWYG editor.
- Hit "Publish."
- The home page of the site shows whichever poem has the category "Featured." If this category does not exist in your WP install, simple create it when creating a poem.
