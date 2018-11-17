<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('Powered by <a href="http://www.typecho.org">Typecho</a> | Theme designed by <a href="https://lose7.org/about.html">Sunshine+Ice</a>'); ?>.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
