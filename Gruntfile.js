module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compass: {
			dist: {
				options: {
					//sourcemap: true,
					config: 'config.rb'
				}
			}
		},
		uglify: {
			dist: {
				files: {
					'js/min/front.min.js': [
						'js/front.js',
						'js/quicksearch.js',
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
				],
				tasks: ['compass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-compass');

	grunt.registerTask('default', ['watch']);

};