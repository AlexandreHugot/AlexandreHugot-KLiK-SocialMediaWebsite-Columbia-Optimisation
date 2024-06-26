module.exports = {
    content: [
        '../index.php',
        '../topics.php',
        '../team.php',
        '../reset-pwd.php',
        '../posts.php',
        '../polls.php',
        '../message.php',
        '../hub.php',
        '../forum.php',
        '../events.php',
        '../event-page.php',
        '../create-topic.php',
        '../create-poll.php',
        '../create-new-pwd.php',
        '../create-event.php',
        '../create-category.php',
        '../create-blog.php',
        '../contact.php',
        '../categories.php',
        '../blogs.php',
        'includes/HTML-head.php'
    ],
    css: [
        './css/loader.css',
        './css/list-page.css',
        './css/creator-portfolio.min.css',
        './css/forum-styles.css',
        './css/inbox.css',
        './css/flipclock.css',
        './css/comp-creation.css',
        './css/contact-util.css',
        './css/contact-main.css',
        './css/bootstrap.css',
        './css/bootstrap.min.css'
    ],
    keyframes: true,
    output: './css/purged/', 
    rejected: true,
    variables: true
};



// purgecss --config ./css/purgecss.config.js --output ./outputCss/purged.css 
