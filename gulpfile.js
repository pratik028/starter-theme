const { src, dest, watch, parallel, series } = require("gulp");
const sass = require('gulp-sass')(require('sass'));
const cssNano = require( 'gulp-cssnano' )
const concatCss = require('gulp-concat-css');
var minify = require('gulp-minify-css')

function generateCSS() {
	return  src('./assets/sass/style.scss')
        .pipe(sass({
            includePaths: ['node_modules']
        }))
		.pipe(
			sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError )
		)
		.pipe( dest( './assets/css' ) )
}

function minifyCSS() {
    return src('./assets/css/style.css')
    .pipe(cssNano())
    .pipe(dest('./assets/css'));
}

function watchFiles() {
    watch('sass/**.scss', generateCSS);
}

exports.css = generateCSS;
exports.minify = minifyCSS;
exports.watch = watchFiles;

exports.default = series( generateCSS );
