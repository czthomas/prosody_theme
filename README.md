## prosody-theme-RoR
specialized prosody fork for UVA's Rhythm of Russian site

### Development Environment

- Developed locally with MAMP 3.2.1 running PHP 5.6.7, node 0.12.7, npm 2.12.1

### Dependencies

- npm: gulp, gulp-stylus, autoprefixer-stylus
- The [Prosody Plugin](https://github.com/scholarslab/prosody_plugin)

### Gulp tasks

- `gulp stylus` will generate css files for any stylus files in css/. It will also run the stylus through autoprefixer.
- `gulp` will run gulp stylus, then watch for any changes to stylus files and regenerate css.

### Things to know

- Prosody follows the standard WordPress templating heirarchy. There is some reduplication between index.php and single-prosody_poem.php. The former controls the home page, which should display the one poem with the category "featured", while the latter controls the appearance of all other single poem pages.
- Uses custom build of bootstrap css that just includes grid and responsive functions. This is located in css/ along with all other css.
- There are two main stylesheets: screen.css and poem.css. Poem.css deals specifically with all elements involved in the display of the poem, such as the rhymebar and the check buttons for each line. This effectively covers everything that was in an iframe in the previous iteration of Prosody. Screen.css covers everything else in the site.
- There are two static pages in the site: Glossary and Instructions. To create these, create a new page, add the appropriate title, then copy in the content from either glossary_text.html or instructions_text.html. This should be copied into the "text" tab of the editor.

### Poem Upload Process

The upload process steps can be found on the [Prosody Plugin](https://github.com/scholarslab/prosody_plugin) page.