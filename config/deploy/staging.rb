# repository info
set :branch, "development"

# This may be the same as your `Web` server
role :app, "ccistudios.com"

# directories
set :deploy_to, "/home/arbors/subdomains/dev"
set :public, "#{deploy_to}/public_html"
set :extensions, %w[com_contest com_dealers public template template2 com_slideshow]
