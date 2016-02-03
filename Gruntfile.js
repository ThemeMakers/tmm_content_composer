module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			dist: {
				files: {
					'js/front.min.js': [
						'js/theme/default.js',
						'js/plugins/waypoints.js'
					],
					'js/plugins/min/jquery.modernizr.min.js': [
						'js/plugins/jquery.modernizr.js'
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
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['watch']);

};