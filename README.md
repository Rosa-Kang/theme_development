# The Rosessom

A modern WordPress theme built with Tailwind CSS, Sass, and Alpine.js for creating beautiful, responsive websites.

## 🌹 Features

- **Modern Tech Stack**: Built with Tailwind CSS, Sass, and Alpine.js
- **WordPress Integration**: Custom post types, templates, and WordPress best practices
- **Responsive Design**: Mobile-first approach with responsive layouts
- **Performance Optimized**: Minified assets, optimized images, and efficient build process
- **Developer Friendly**: Hot reloading, linting, and modern development workflow

## 📋 Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Node.js 16.x or higher
- npm or yarn

## 🚀 Quick Start

1. **Clone the theme** into your WordPress themes directory:
   ```bash
   cd wp-content/themes/
   git clone [repository-url] therosessom
   ```

2. **Install dependencies**:
   ```bash
   cd therosessom
   npm install
   ```

3. **Configure BrowserSync** (optional):
   Update the proxy URL in `package.json` to match your local WordPress development URL:
   ```json
   "serve": "browser-sync start --proxy 'your-local-url.test' ..."
   ```

4. **Start development**:
   ```bash
   npm run dev
   ```

5. **Activate the theme** in WordPress admin panel.

## 📁 Project Structure

```
therosessom/
├── assets/              # Compiled assets (CSS, JS, images)
│   ├── fonts/          # Web fonts
│   ├── images/         # Theme images
│   ├── css/            # Compiled CSS (generated)
│   └── js/             # Compiled JavaScript (generated)
├── inc/                # PHP includes and theme functionality
├── js/                 # Source JavaScript files
├── node_modules/       # Node dependencies (git ignored)
├── sass/               # Source Sass files
├── template-parts/     # Reusable template parts
├── *.php              # WordPress template files
├── package.json       # Node.js dependencies and scripts
├── postcss.config.js  # PostCSS configuration
├── .eslintrc.json     # ESLint configuration
├── .prettierrc        # Prettier configuration
└── style.css          # WordPress theme information
```

## 🛠️ Development

### Available Scripts

- **`npm run dev`** - Start development server with hot reloading
- **`npm run build`** - Build production-ready assets
- **`npm run watch:sass`** - Watch and compile Sass files
- **`npm run watch:js`** - Watch and compile JavaScript files
- **`npm run lint`** - Lint JavaScript and Sass files
- **`npm run format`** - Format code with Prettier

### Key Files

- **`functions.php`** - Theme setup and functionality
- **`index.php`** - Main template file
- **`header.php`** - Site header template
- **`footer.php`** - Site footer template
- **`page.php`** - Default page template
- **`single.php`** - Single post template
- **`archive.php`** - Archive pages template
- **`home.php`** - Homepage template
- **`front-page.php`** - Static front page template

### Custom Templates

- **`page-about.php`** - About page template
- **`page-contact.php`** - Contact page template
- **`page-faq.php`** - FAQ page template
- **`archive-team_members.php`** - Team members archive

## 🎨 Styling

The theme uses a combination of Tailwind CSS and custom Sass:

- Tailwind CSS for utility-first styling
- Custom Sass files in `/sass` directory for component styles
- PostCSS for processing Tailwind and autoprefixing

## 📦 Build Process

### Development Build
```bash
npm run dev
```
This will:
- Watch Sass and JavaScript files for changes
- Compile assets with source maps
- Start BrowserSync for live reloading

### Production Build
```bash
npm run build
```
This will:
- Clean the build directories
- Compile and minify CSS
- Bundle and minify JavaScript
- Optimize images

## 🔧 Configuration

### Tailwind CSS
Configure Tailwind in `tailwind.config.js`. The theme includes:
- `@tailwindcss/forms` - Form styling utilities
- `@tailwindcss/typography` - Typography utilities

### PostCSS
PostCSS configuration is in `postcss.config.js` with Tailwind CSS and Autoprefixer.

### ESLint
JavaScript linting configuration in `.eslintrc.json`.

### Prettier
Code formatting configuration in `.prettierrc`.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👤 Author

**Rosa Kang**

## 🙏 Acknowledgments

- Built with WordPress
- Styled with Tailwind CSS
- Enhanced with Alpine.js
- Powered by modern build tools