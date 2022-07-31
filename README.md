# Starter Theme

## Theme structure

```sh
themes/your-theme-name/      # → Root of your theme
├── includes/                # → Theme functional files. You can add here the code to register blocks, shortcodes, etc
├── admin/                   # → Code to run on admin side only.
│   ├── class-allow-svg.php/ # → To enable SVG file uploads in media library.
│   ├── class-cpt.php/       # → Register Custom post types
│   ├── class-taxonomy.php   # → Register custom taxonomies.
├── blocks/                  # → Register Custom blocks.
├── frontend/                # → Code to run on front-end only.
│   ├── class-assets.php/    # → Code to enqueu scripts and styles needed on the frontend.
│   ├── class-rest.php/      # → Code to register custom REST endpoints
│   ├── class-setup.php      # → Code to run after the theme is setup. This will basically have the code to include the different functional files
├── assets/                  # → Compiled & Non-compiled CSS & JS files.
│   ├── sass/                # → Non-cmpiled SCSS files.
│   ├── css/                 # → Cmpiled CSS files.
│   ├── src/                 # → Non-cmpiled JS files.
│   ├── js/                  # → Cmpiled JS files.
│   ├── images/              # → Images needed.
├── templates/               # → Block Theme HTML templates goes here.
├── parts/                   # → Template parts needed in Block theme.
├── composer.json            # → Autoloading for `includes/` files
├── functions.php            # → Theme bootloader
├── index.php                # → Theme template wrapper
├── node_modules/            # → Node.js packages (never edit)
├── package.json             # → Node.js dependencies and scripts
├── screenshot.png           # → Theme screenshot for WP admin
├── style.css                # → Theme meta information
├── vendor/                  # → Composer packages (never edit)
└── webpack.config.js        # → Bud configuration
```

## Theme installation
1. Download the theme and replace all instances of `THEME_NAME` with your `PROJECT_NAME`, `theme_name` to `project_name`, & `Theme_Name` to `Project_Name`.
2. Run componser install command.
3. Modify the packages if needed using `composer install` or `composer remove <package_name>` command
4. To build the files run `npm install` to install the node_modules & `npm run build`to build the JS & CSS files.


## Build Commands

- `npm run build`   - Compile assets for production
- `npm run scripts` - Compile only the JS files
- `gulp`            - Compile only the CSS files