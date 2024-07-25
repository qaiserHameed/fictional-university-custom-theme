
const path = require('path');

module.exports = {
  entry: './src/scripts.js', // Path to your main JavaScript file
  output: {
    filename: 'bundle.js', // Name of the output bundled file
    path: path.resolve(__dirname, 'dist'), // Output directory
  },
  module: {
    rules: [
      {
        test: /\.css$/, // Apply this rule to .css files
        use: ['style-loader', 'css-loader'], // Use style-loader and css-loader
      },
    ],
  },
  resolve: {
    modules: [path.resolve(__dirname, 'node_modules'), 'node_modules'],
  },
  mode: 'development', // Set mode to development
};
