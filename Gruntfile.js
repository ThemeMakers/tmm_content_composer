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
					'js/plugins/min/jquery.masonry.min.js': [
						'js/plugins/jquery.masonry.js'
					],
					'js/plugins/min/jquery.modernizr.min.js': [
						'js/plugins/jquery.modernizr.js'
					],
					'js/plugins/min/jquery.tooltipster.min.js': [
						'js/plugins/jquery.tooltipster.js'
					],
					'js/plugins/min/jquery.progressBar.min.js': [
						'js/plugins/jquery.progressBar.js'
					],
					'js/plugins/min/gallery3d.min.js': [
						'js/plugins/gallery3d.js'
					],
					'js/plugins/min/jquery.cycle.min.js': [
						'js/plugins/jquery.cycle.js'
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