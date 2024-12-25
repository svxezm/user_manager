module.exports = (grunt) => {
    // Load Grunt plugins
    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-sass");
    grunt.loadNpmTasks("grunt-contrib-uglify");

    // Grunt configuration
    grunt.initConfig({
        // Sass task
        sass: {
            dist: {
                files: {
                    // Destination sources
                    "public/styles/index.css": "src/styles/index.scss",
                    "public/styles/user_list.css": "src/styles/user_list.scss"
                }
            }
        },
        uglify: {
            dist: {
                files: {
                    "public/scripts/user_list.min.js": "src/scripts/user_list.js"
                }
            }
        },
        watch: {
            sass: {
                files: ["src/styles/**/*.scss"],
                tasks: ["sass"]
            },
            js: {
                files: ["src/scripts/**/*.js"],
                tasks: ["uglify"]
            }
        }
    });

    grunt.registerTask("default", ["sass", "uglify"]);
    grunt.registerTask("watcher", ["watch"]);
}
