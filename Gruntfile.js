module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			dist: {
				files: {
					'js/min/front.min.js': [
						'js/front.js'
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
				'js/front.js'
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