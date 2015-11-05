module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			options: {
				compress: false
			},
			tmm_content_composer: {
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
				tasks: ['uglify:tmm_content_composer']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('tmm_content_composer', ['uglify:tmm_content_composer']);

};