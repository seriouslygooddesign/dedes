const cssnano = require("cssnano")({
  preset: "default",
});

module.exports = ({ env }) =>
  env === "production"
    ? {
      plugins: [
        require("postcss-combine-media-query"),
        require("autoprefixer"),
        cssnano,
      ],
    }
    : {
      plugins: [require("autoprefixer")],
    };
