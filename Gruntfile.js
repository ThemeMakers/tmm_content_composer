module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			plugin: {
				options: {
					cacheLocation: '../../../.sass-cache',
					style: 'compressed'
				},
				files: {
					'css/style-lc.css': 'scss/style-lc.scss'
				}
			}
		},
		uglify: {
			dist: {
				files: {
					'js/min/front.min.js': [
						'js/front.js',
						'js/select2.js',
						// 'js/select2.full.js',
						'js/quicksearch.js'
					]
				}
			}
		},
		watch: {
			scripts: {
				files: [
					'js/*.js'
				],
				tasks: ['uglify']
			},
			styles: {
				files: [
					'scss/*.scss'
				],
				tasks: ['sass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.registerTask('default', ['sass'], ['watch']);

};