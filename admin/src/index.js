import CMS from 'netlify-cms-app'

CMS.init({
  config: {
    backend: {
      name: 'git-gateway',
      branch: 'main'
    },
    media_folder: 'images/uploads',
    public_folder: '/images/uploads',
    collections: [
      {
        name: 'blog',
        label: 'Blog Posts',
        folder: '_posts/blog',
        create: true,
        slug: '{{year}}-{{month}}-{{day}}-{{slug}}',
        fields: [
          { label: 'Title', name: 'title', widget: 'string' },
          { label: 'Publish Date', name: 'date', widget: 'datetime' },
          { label: 'Featured Image', name: 'image', widget: 'image' },
          { label: 'Excerpt', name: 'excerpt', widget: 'text' },
          { label: 'Body', name: 'body', widget: 'markdown' }
        ]
      }
    ]
  }
})