'use strict';
module.exports = function (grunt) {
    require('load-grunt-tasks')(grunt);
    require('time-grunt')(grunt);

    // Define the configuration for all the tasks
    grunt.initConfig({
        cssmin: {
          combine: {
            files: {
              'assets/dist/main.css': ['assets/css/{,*/}*.css']
            }
          }
        },
        // Add vendor prefixed styles
        autoprefixer: {
            options: {
                browsers: ['last 3 version']
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: 'assets/dist/',
                    src: '{,*/}*.css',
                    dest: 'assets/dist/'
                }]
            }
        },
        concat: {
            options: {
                stripBanners: true,
                separator: ';'
            },
            dist: {
                src: ['assets/js/{,*/}*.js','!assets/js/vendor/modernizr.js'],
                dest: 'assets/dist/main.js'
            }
        },
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                reporter: require('jshint-stylish')
            },
            all: [
                'assets/js/{,*/}*.js',
                '!assets/js/vendor/*'
            ]
        },
        uglify: {
            all: {
                files: {
                    'assets/dist/main.min.js': ['assets/dist/main.js']
                },
                options: {
                    mangle: {
                        except: ['jQuery']
                    }
                }
            }
        },
        watch:  {
            bower: {
                files: ['bower.json'],
                tasks: ['bower']
            },
            js: {
                files: ['assets/js/{,*/}*.js'],
                tasks: ['jshint', 'concat', 'uglify'],
                options: {
                    debounceDelay: 500
                }
            },
            gruntfile: {
                files: ['Gruntfile.js']
            },
            styles: {
                files: ['assets/css/{,*/}*.css'],
                tasks: ['newer:copy:styles', 'autoprefixer']
            },
        },
        imagemin: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'assets/img',
                    src: '*.{gif,jpeg,jpg,png}',
                    dest: 'assets/img'
                }]
            }
        },
        concurrent: {
            dist: [
                'imagemin'
            ]
        },
        modernizr: {
            dist: {
                devFile: 'assets/js/vendor/modernizr.js',
                outputFile: 'assets/dist/modernizr.js',
                extra : {
                    "mq" : true
                },
                extensibility : {
                    "prefixed" : true,
                    "teststyles" : true,
                    "testprops" : true,
                    "testallprops" : true,
                    "prefixes" : true,
                    "domprefixes" : true
                },
                files: {
                    src: [
                        'assets/js/{,*/}*.js',
                        'assets/css/{,*/}*.css',
                        '!assets/js/vendor/*'
                    ]
                },
                uglify: true,
                parseFiles : true
            }
        },
        clean: ['assets/dist','assets/js/vendor/*'],
        bowercopy: {
            options: {
                srcPrefix: 'bower_components'
            },
            scripts: {
                options: {
                    destPrefix: 'assets/js/vendor'
                },
                files: {
                    'modernizr.js': 'modernizr/modernizr.js'
                }
            }
        }
        
    });
    
    grunt.registerTask('bower', [
        'bowercopy'
    ]);

    grunt.registerTask('build', [
        'clean',
        'bower',
        'autoprefixer',
        'concurrent:dist',
        'concat',
        'cssmin',
        'uglify',
        'modernizr'
    ]);

    grunt.registerTask('default', [
        'newer:jshint',
        'build'
    ]);
};
