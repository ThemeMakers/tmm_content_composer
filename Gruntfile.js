module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			dist: {
				files: {
					'js/front.min.js': [
						'js/theme/default.js'
					],
					'js/plugins/min/jquery.masonry.min.js': [
						'js/plugins/jquery.masonry.js'
					],
					'js/plugins/min/jquery.modernizr.min.js': [
						'js/plugins/jquery.modernizr.js'
					],
					'js/plugins/min/jquery.tooltipster.min.js': [
						'js/plugins/jquery.tooltipster.js'
					],
					'js/plugins/min/jquery.mixitup.min.js': [
						'js/plugins/jquery.mixitup.js'
					]
				}
			}
		},
		watch: {
			scripts: {
				files: [
					'js/*.js',
				],
				tasks: ['uglify']
			},
			styles: {
				files: [
					'scss/*.scss'
				]

			}
		},
		jshint: {
			files: [
				'js/theme/default.js'
			],
			options: {
				globals: {
					jQuery: true
				}
			}
		},
		// cssminify tool https://github.com/gruntjs/grunt-contrib-cssmin
		cssmin: {
			options: {
				shorthandCompacting: false,
				roundingPrecision: -1
			},
			target: {
				files: [{
					'css/front.min.css': ['css/mediaelement/mediaelementplayer.css', 'css/front.css']
				}]
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('default', ['watch']);

};