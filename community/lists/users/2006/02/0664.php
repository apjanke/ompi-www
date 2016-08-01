<? include("../../include/msg-header.inc"); ?>
<!-- received="Tue Feb 14 19:19:23 2006" -->
<!-- isoreceived="20060215001923" -->
<!-- sent="Tue, 14 Feb 2006 19:19:22 -0500" -->
<!-- isosent="20060215001922" -->
<!-- name="Brian Barrett" -->
<!-- email="brbarret_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Installing OpenMPI on a solaris" -->
<!-- id="393DA5BD-5CF9-46BD-96D3-510E55ABF3A3_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="C0179037.8B60%xyang_at_lanl.gov" -->
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
<strong>From:</strong> Brian Barrett (<em>brbarret_at_[hidden]</em>)<br>
<strong>Date:</strong> 2006-02-14 19:19:22
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0665.php">Andy Vierstraete: "Re: [OMPI users] problem running Migrate with open-MPI"</a>
<li><strong>Previous message:</strong> <a href="0663.php">Jeff Squyres: "Re: [OMPI users] Cannonical ring program and Mac OSX 10.4.4"</a>
<li><strong>In reply to:</strong> <a href="0660.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0668.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
<li><strong>Reply:</strong> <a href="0668.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Can you send me the config.log file generated by Open MPI's  
<br>
configure?  It should give some indication as to what is wrong.  If  
<br>
you are on a Ultra Sparc machine (pretty much any machine built after  
<br>
the Ultra 1), you might want to set the compiler flags to set the  
<br>
default build mode to v8plus (aka 32 bit sparc v9).  The difference  
<br>
between the default v8 assembly and the v8plus assembly is pretty  
<br>
great in terms of performance.  Configuring Open MPI with something  
<br>
like:
<br>
<p>&nbsp;&nbsp;&nbsp;./configure CFLAGS=&quot;-mv8plus&quot; CXXFLAGS=&quot;-mv8plus&quot; FFLAGS=&quot;-mv8plus&quot; \
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FCFLAGS=&quot;-mv8plus&quot; &lt;other options&gt;
<br>
<p>should do the trick.
<br>
<p>Brian
<br>
<p>On Feb 14, 2006, at 3:48 PM, Xiaoning (David) Yang wrote:
<br>
<p><span class="quotelev1">&gt; Brian,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thank you for your help. It turned out that my path pointed to an  
</span><br>
<span class="quotelev1">&gt; older
</span><br>
<span class="quotelev1">&gt; version of gcc. After correcting that, I no longer get the same  
</span><br>
<span class="quotelev1">&gt; error. But
</span><br>
<span class="quotelev1">&gt; now the error becomes, after I issued &quot;make all install&quot;,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ......
</span><br>
<span class="quotelev1">&gt; gcc -DHAVE_CONFIG_H -I. -I. -I../../include -I../../include -I../../ 
</span><br>
<span class="quotelev1">&gt; include
</span><br>
<span class="quotelev1">&gt; -I../.. -I../.. -I../../include -I../../opal -I../../orte -I../../ompi
</span><br>
<span class="quotelev1">&gt; -D_REENTRANT -O3 -DNDEBUG -fno-strict-aliasing -c req_test.c
</span><br>
<span class="quotelev1">&gt; -Wp,-MD,.deps/req_test.TPlo  -fPIC -DPIC -o .libs/req_test.o
</span><br>
<span class="quotelev1">&gt; /usr/ccs/bin/as: &quot;/var/tmp//cc5lFbCH.s&quot;, line 17: error: cannot use  
</span><br>
<span class="quotelev1">&gt; v8plus
</span><br>
<span class="quotelev1">&gt; instructions in a non-v8plus target binary
</span><br>
<span class="quotelev1">&gt; /usr/ccs/bin/as: &quot;/var/tmp//cc5lFbCH.s&quot;, line 155: error: cannot  
</span><br>
<span class="quotelev1">&gt; use v8plus
</span><br>
<span class="quotelev1">&gt; instructions in a non-v8plus target binary
</span><br>
<span class="quotelev1">&gt; *** Error code 1
</span><br>
<span class="quotelev1">&gt; make: Fatal error: Command failed for target `req_test.lo'
</span><br>
<span class="quotelev1">&gt; Current working directory /home/xyang/openmpi/openmpi-1.0.1/ompi/ 
</span><br>
<span class="quotelev1">&gt; request
</span><br>
<span class="quotelev1">&gt; *** Error code 1
</span><br>
<span class="quotelev1">&gt; make: Fatal error: Command failed for target `all-recursive'
</span><br>
<span class="quotelev1">&gt; Current working directory /home/xyang/openmpi/openmpi-1.0.1/ompi
</span><br>
<span class="quotelev1">&gt; *** Error code 1
</span><br>
<span class="quotelev1">&gt; make: Fatal error: Command failed for target `all-recursive'
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Any clue what went wrong this time? Thanks a lot!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; David
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ***** Correspondence *****
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; From: Brian Barrett &lt;brbarret_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Reply-To: Open MPI Users &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Date: Tue, 14 Feb 2006 13:54:21 -0500
</span><br>
<span class="quotelev2">&gt;&gt; To: Open MPI Users &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Subject: Re: [OMPI users] Installing OpenMPI on a solaris
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Feb 14, 2006, at 11:57 AM, Xiaoning (David) Yang wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks for the info. I tried to compile the simple code in your
</span><br>
<span class="quotelev3">&gt;&gt;&gt; email with
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 'c++ -c foo.c' and got the similar error. Does it mean that my
</span><br>
<span class="quotelev3">&gt;&gt;&gt; compiler was
</span><br>
<span class="quotelev3">&gt;&gt;&gt; not configured correctly? Thanks.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Yes, it points to a configuration issue with your C++ compiler.
</span><br>
<span class="quotelev2">&gt;&gt; Until that issue is resolved, it will be impossible to compile Open
</span><br>
<span class="quotelev2">&gt;&gt; MPI on that machine.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Brian
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ***** Correspondence *****
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; From: Brian Barrett &lt;brbarret_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Reply-To: Open MPI Users &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Date: Tue, 14 Feb 2006 08:48:49 -0500
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; To: Open MPI Users &lt;users_at_[hidden]&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Subject: Re: [OMPI users] Installing OpenMPI on a solaris
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Feb 13, 2006, at 12:29 PM, Xiaoning (David) Yang wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'm installing OpenMPI on a solaris system and got the following
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; error
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; message when running make:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; /usr/local/lib/gcc-lib/sparc-sun-solaris2.6/2.95/../../../../
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; include/g++-3/s
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; tl_config.h:151: _G_config.h: No such file or directory
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; What does it mean and how to solve the problem. Thanks for any  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; help!
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; It is hard to tell without seeing the surrounding output, but it
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; appears that your C++ compiler is configured incorrectly and not  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; able
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; to compile STL code.  You might want to try building a simple  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Hello,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; World example using the IOStreams (like the one below) -- if that
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; doesn't work, you need to talk to your sysadmin or the supplier of
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the GCC binaries you are using and figure out how to get simple
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; applications to compile.  If the simple example compiles, please  
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; send
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; us the config.log from your Open MPI source tree and a bit more of
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; the output from make.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Brian
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;    Brian Barrett
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;    Open MPI developer
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;    <a href="http://www.open-mpi.org/">http://www.open-mpi.org/</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; #include &lt;iostream&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; int
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; main(int argc, char *argv[])
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; {
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;      std::cout &lt;&lt; &quot;Hello, World&quot; &lt;&lt; std::endl;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;      return 0;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; }
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -- 
</span><br>
<span class="quotelev2">&gt;&gt;    Brian Barrett
</span><br>
<span class="quotelev2">&gt;&gt;    Open MPI developer
</span><br>
<span class="quotelev2">&gt;&gt;    <a href="http://www.open-mpi.org/">http://www.open-mpi.org/</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; users mailing list
</span><br>
<span class="quotelev2">&gt;&gt; users_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<p><pre>
-- 
   Brian Barrett
   Open MPI developer
   <a href="http://www.open-mpi.org/">http://www.open-mpi.org/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0665.php">Andy Vierstraete: "Re: [OMPI users] problem running Migrate with open-MPI"</a>
<li><strong>Previous message:</strong> <a href="0663.php">Jeff Squyres: "Re: [OMPI users] Cannonical ring program and Mac OSX 10.4.4"</a>
<li><strong>In reply to:</strong> <a href="0660.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0668.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
<li><strong>Reply:</strong> <a href="0668.php">Xiaoning (David) Yang: "Re: [OMPI users] Installing OpenMPI on a solaris"</a>
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