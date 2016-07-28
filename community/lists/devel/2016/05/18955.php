<?
$subject_val = "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?";
include("../../include/msg-header.inc");
?>
<!-- received="Tue May 10 16:50:21 2016" -->
<!-- isoreceived="20160510205021" -->
<!-- sent="Tue, 10 May 2016 16:50:20 -0400" -->
<!-- isosent="20160510205020" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?" -->
<!-- id="CAMJJpkXcHe+xa18x+rOXQmdWnqc9ocaCKBJq4JoBdEY_M4pVow_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="CAAvDA15uV2aiYcJcKBcEATAjcRow29KDr0SJGh10aq=iM4oYjg_at_mail.gmail.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2016-05-10 16:50:20
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18956.php">Jeff Squyres (jsquyres): "[OMPI devel] Jenkins mindist test now failing in 2.x"</a>
<li><strong>Previous message:</strong> <a href="18954.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<li><strong>In reply to:</strong> <a href="18954.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18957.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<li><strong>Reply:</strong> <a href="18957.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
The opal_atomic_add function contains all the possible calls to the
<br>
underlying atomic functions, based on the size of the data. Thus, if we
<br>
detect that 64 bits atomics are available, and if the compiler doesn't
<br>
automatically remove the unnecessary code (from the switch case with a
<br>
const), then we will [wrongfully] generate the stub for calling the 64 bits
<br>
atomic operation.
<br>
<p>&nbsp;&nbsp;George.
<br>
<p><p><p>On Tue, May 10, 2016 at 3:48 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; George,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I believe that the 64-bit atomics support detection issue that you are
</span><br>
<span class="quotelev1">&gt; suspecting is already covered by Nathan's PR1659 on master, and will be
</span><br>
<span class="quotelev1">&gt; PRed/CMRed for v2.x after that is merged.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Regardless of that, however, since the field is declared as &quot;volatile
</span><br>
<span class="quotelev1">&gt; int32_t&quot; the opal_list code does need to be fixed to use 32-bit operations
</span><br>
<span class="quotelev1">&gt; unconditionally, right?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Tue, May 10, 2016 at 12:36 PM, George Bosilca &lt;bosilca_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Paul,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I think the ref_count should always be manipulated with atomic
</span><br>
<span class="quotelev2">&gt;&gt; operations, otherwise we can't use them for internal, thread-safe,
</span><br>
<span class="quotelev2">&gt;&gt; purposes. That being said the issue at hand seems a little different. The
</span><br>
<span class="quotelev2">&gt;&gt; difference in the generated code between the opal_atomic_add and the
</span><br>
<span class="quotelev2">&gt;&gt; OPAL_THREAD_ADD32, is that the macro is explicitly calling
</span><br>
<span class="quotelev2">&gt;&gt; opal_atomic_add32, while the generic atomic_add has a switch inside (to
</span><br>
<span class="quotelev2">&gt;&gt; select between atomics operations on different type). For the error you
</span><br>
<span class="quotelev2">&gt;&gt; mention to happen our configure script must have detected that there is
</span><br>
<span class="quotelev2">&gt;&gt; support for 8bytes atomic operations, thus setting OPAL_HAVE_ATOMIC_ADD_64
</span><br>
<span class="quotelev2">&gt;&gt; to 1.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Can you take a look at the 64 bits atomic detection in the config.log and
</span><br>
<span class="quotelev2">&gt;&gt; post here the corresponding output ?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt;   George.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Tue, May 10, 2016 at 1:38 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I am currently working with the v2.x branch, rather than tarballs.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; While attempting to build on AIX (which is ILP32 by default), I
</span><br>
<span class="quotelev3">&gt;&gt;&gt; encountered an unexpected undefined reference to __sync_add_and_fetch_8()
</span><br>
<span class="quotelev3">&gt;&gt;&gt; from opal/class/opal_list.h.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I found that when debugging is enabled (as in almost every build I try)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; there is the following code:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #if OPAL_ENABLE_DEBUG
</span><br>
<span class="quotelev3">&gt;&gt;&gt;         /* Spot check: ensure this item is only on the list that we
</span><br>
<span class="quotelev3">&gt;&gt;&gt;            just insertted it into */
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;         (void)opal_atomic_add( &amp;(item-&gt;opal_list_item_refcount), 1 );
</span><br>
<span class="quotelev3">&gt;&gt;&gt;         assert(1 == item-&gt;opal_list_item_refcount);
</span><br>
<span class="quotelev3">&gt;&gt;&gt;         item-&gt;opal_list_item_belong_to = list;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; #endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I am not sure why (and it may be an AIX-specific issue), but that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; &quot;opal_atomic_add()&quot; is attempting a 64-bit add.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; That is a problem, given that 'opal_list_item_refcount' is 32-bits!
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Noting that all other accesses to this field are OPAL_THREAD_ADD32(), I
</span><br>
<span class="quotelev3">&gt;&gt;&gt; suggest the following (with a bonus spell-check at no additional charge):
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --- opal/class/opal_list.c~     2016-05-10 10:20:19.000000000 -0700
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +++ opal/class/opal_list.c      2016-05-10 10:29:14.000000000 -0700
</span><br>
<span class="quotelev3">&gt;&gt;&gt; @@ -142,9 +142,9 @@
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;   #if OPAL_ENABLE_DEBUG
</span><br>
<span class="quotelev3">&gt;&gt;&gt;           /* Spot check: ensure this item is only on the list that we
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -            just insertted it into */
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +            just inserted it into */
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -         (void)opal_atomic_add( &amp;(item-&gt;opal_list_item_refcount), 1 );
</span><br>
<span class="quotelev3">&gt;&gt;&gt; +         (void)OPAL_THREAD_ADD32( &amp;(item-&gt;opal_list_item_refcount), 1 );
</span><br>
<span class="quotelev3">&gt;&gt;&gt;           assert(1 == item-&gt;opal_list_item_refcount);
</span><br>
<span class="quotelev3">&gt;&gt;&gt;           item-&gt;opal_list_item_belong_to = list;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;   #endif
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Source inspection shows the same mixing or opal_atomic_add() vs
</span><br>
<span class="quotelev3">&gt;&gt;&gt; OPAL_THREAD_ADD32() in master.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -Paul
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Link to this post:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18952.php">http://www.open-mpi.org/community/lists/devel/2016/05/18952.php</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18953.php">http://www.open-mpi.org/community/lists/devel/2016/05/18953.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Computer Languages &amp; Systems Software (CLaSS) Group
</span><br>
<span class="quotelev1">&gt; Computer Science Department               Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2016/05/18954.php">http://www.open-mpi.org/community/lists/devel/2016/05/18954.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-18955/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="18956.php">Jeff Squyres (jsquyres): "[OMPI devel] Jenkins mindist test now failing in 2.x"</a>
<li><strong>Previous message:</strong> <a href="18954.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<li><strong>In reply to:</strong> <a href="18954.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="18957.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<li><strong>Reply:</strong> <a href="18957.php">Paul Hargrove: "Re: [OMPI devel] [v2.x] opal_list debug ref-count bug?"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
