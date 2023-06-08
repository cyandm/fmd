module.exports = function (grunt) {
  grunt.initConfig({
    autoprefixer: {
      dist: {
        files: {
          'css/final.css': 'css/normal.css',
        },
      },
    },
    watch: {
      styles: {
        files: ['css/normal.css'],
        tasks: ['autoprefixer'],
      },
    },
  });
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');
};
