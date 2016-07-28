<?
$subject_val = "Re: [OMPI devel] Warnings from pgcc-13.10";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Jan 17 15:44:32 2014" -->
<!-- isoreceived="20140117204432" -->
<!-- sent="Fri, 17 Jan 2014 12:44:22 -0800" -->
<!-- isosent="20140117204422" -->
<!-- name="Paul Hargrove" -->
<!-- email="phhargrove_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Warnings from pgcc-13.10" -->
<!-- id="CAAvDA17uzjvA-hCrm+bXtkJNyrgPTp21O-LJhqv0PiSK1a=6tg_at_mail.gmail.com" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="8C8CB3E1-E37A-4085-8ACF-9CBB6BE8E9E3_at_open-mpi.org" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Warnings from pgcc-13.10<br>
<strong>From:</strong> Paul Hargrove (<em>phhargrove_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-01-17 15:44:22
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>Previous message:</strong> <a href="13795.php">Larry Baker: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>In reply to:</strong> <a href="13794.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>Reply:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ralph,
<br>
<p>I might be the most active lurker on Earth, but I am still that: an
<br>
individual outside the OMPI core developers who follows the devel list.
<br>
&nbsp;So, excepting bugs that cause me actual harm (and this is NOT one) I am
<br>
usually happy to defer to the core developers.
<br>
<p>As I just sent in response to Larry Baker, I've determined that PGI is
<br>
warning about (const char *) arguments passed to varargs functions, which
<br>
seems to me to be a bug (how can you claim to be type checking arguments
<br>
against &quot;...&quot;).
<br>
So, I vote for ignore.
<br>
<p>And just to close the issue you raised earlier (the last 3 instances not
<br>
involving const char *):
<br>
I *did* find the last three instances to all involve passing a (const char
<br>
*):
<br>
&nbsp;&nbsp;&nbsp;state_base_fns.c: orte_job_state_to_str() returns a const-qualified
<br>
value (the only tricky case).
<br>
&nbsp;&nbsp;&nbsp;plm_rsh_component.c: parameter 'agent_list' is const-qualified
<br>
&nbsp;&nbsp;&nbsp;plm_rsh_module.c: parameter 'agent' is const-qualified.
<br>
<p>Adding casts to string literals did NOT change or eliminate the warnings.
<br>
<p>-Paul
<br>
<p><p>On Fri, Jan 17, 2014 at 12:27 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Hmmm...I hate chasing compiler bugs, and since this is only a warning, I
</span><br>
<span class="quotelev1">&gt; would tend to defer making changes and just let folks push on PGI to fix
</span><br>
<span class="quotelev1">&gt; their bug.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Anyone object to that strategy?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Jan 17, 2014, at 12:04 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Larry,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; So, if I follow your report correctly is is probably the &quot;static&quot; (not the
</span><br>
<span class="quotelev1">&gt; &quot;const&quot;) property of the string literals' type that leads pgcc to warn.  If
</span><br>
<span class="quotelev1">&gt; that is the case, then I agree that this is NOT a warning that is
</span><br>
<span class="quotelev1">&gt; consistent with the C standard's rules for type compatibility.  Thus I
</span><br>
<span class="quotelev1">&gt; agree that it is probably a PGI bug.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Ralph,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; If we determine that these warnings are the product of a PGI bug, but one
</span><br>
<span class="quotelev1">&gt; can silence them with a cast, then how do you want to proceed?  I can
</span><br>
<span class="quotelev1">&gt; probably sort out all four combinations of static and const qualified char*
</span><br>
<span class="quotelev1">&gt; pretty quickly (once I get the chance).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; -Paul
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Fri, Jan 17, 2014 at 11:44 AM, Larry Baker &lt;baker_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Paul,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; From what I can see in the arguments to OPAL_OUTPUT_VERBOSE() in line
</span><br>
<span class="quotelev2">&gt;&gt; 356 at
</span><br>
<span class="quotelev2">&gt;&gt; <a href="https://bitbucket.org/ompiteam/ompi-svn-mirror/src/f48eeda443104a64dc89e4f5fab4c940e44d8615/opal/mca/db/hash/db_hash.c">https://bitbucket.org/ompiteam/ompi-svn-mirror/src/f48eeda443104a64dc89e4f5fab4c940e44d8615/opal/mca/db/hash/db_hash.c</a>,
</span><br>
<span class="quotelev2">&gt;&gt; this is the same PGI bug I reported 22 Jul 2010, which was assigned TPR
</span><br>
<span class="quotelev2">&gt;&gt; 17139.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Customer information:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Larry Baker
</span><br>
<span class="quotelev2">&gt;&gt; US Geological Survey
</span><br>
<span class="quotelev2">&gt;&gt; 650-329-5608
</span><br>
<span class="quotelev2">&gt;&gt; baker_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Product: 2183-WS
</span><br>
<span class="quotelev2">&gt;&gt; PIN: 507549
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Problem description:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I am trying to track down the warnings that occur when compiling the UCAR
</span><br>
<span class="quotelev2">&gt;&gt; NetCDF package with PGI compilers.  I have found a case that gcc does not
</span><br>
<span class="quotelev2">&gt;&gt; warn about, but pgcc does.  If I understand the code and the C (1990)
</span><br>
<span class="quotelev2">&gt;&gt; standard, I think pgcc is complaining too much.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; You can reproduce the warnings by downloading the UCAR NetCDF source
</span><br>
<span class="quotelev2">&gt;&gt; package, netcdf.tar.gz, from<a href="http://www.unidata.ucar.edu/software/netcdf/">http://www.unidata.ucar.edu/software/netcdf/</a>.
</span><br>
<span class="quotelev2">&gt;&gt;  Assuming you download it to /usr/local/src, here are the commands that
</span><br>
<span class="quotelev2">&gt;&gt; illustrate the warnings:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; # cd /usr/local/src
</span><br>
<span class="quotelev2">&gt;&gt; # tar -xzf netcdf.tar.gz
</span><br>
<span class="quotelev2">&gt;&gt; # cd netcdf-4.1.1
</span><br>
<span class="quotelev2">&gt;&gt; # ./configure &gt;/dev/null 2&gt;&amp;1
</span><br>
<span class="quotelev2">&gt;&gt; # cd ncgen
</span><br>
<span class="quotelev2">&gt;&gt; # pgcc -DHAVE_CONFIG_H -I. -I.. -I../fortran       -I.. -I../libsrc
</span><br>
<span class="quotelev2">&gt;&gt; -I../libsrc    -g -O2 -tp amd64 -Msignextend -DNO_PGI_OFFSET -c -o genf77.o
</span><br>
<span class="quotelev2">&gt;&gt; genf77.c
</span><br>
<span class="quotelev2">&gt;&gt; PGC-W-0095-Type cast required for this conversion (genf77.c: 498)
</span><br>
<span class="quotelev2">&gt;&gt; PGC-W-0095-Type cast required for this conversion (genf77.c: 511)
</span><br>
<span class="quotelev2">&gt;&gt; PGC/x86-64 Linux 10.3-0: compilation completed with warnings
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; To eliminate the warnings, I had to modify the two source lines to cast
</span><br>
<span class="quotelev2">&gt;&gt; the result from static const char* f77varncid() as (char *):
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    /* Use the specialized put_att_XX routines if possible*/
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    switch (basetype-&gt;typ.typecode) {
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_BYTE:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_SHORT:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_INT:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_FLOAT:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_DOUBLE:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        f77attrify(asym,code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        codedump(code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        bbClear(code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        bbprintf0(stmt,&quot;stat = nf_put_att_%s(ncid, %s, %s, %s, %lu,
</span><br>
<span class="quotelev2">&gt;&gt; %sval)\n&quot;,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                nfstype(basetype-&gt;typ.typecode),
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                (asym-&gt;att.var == NULL?&quot;NF_GLOBAL&quot;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                                      :(char *)
</span><br>
<span class="quotelev2">&gt;&gt; f77varncid(asym-&gt;att.var)),   &lt;--- here
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                f77escapifyname(asym-&gt;name),
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                nftype(basetype-&gt;typ.typecode),
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                len,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                ncftype(basetype-&gt;typ.typecode));
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        codedump(stmt);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        break;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    case NC_CHAR:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        len = bbLength(code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        f77quotestring(code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        bbprintf0(stmt,&quot;stat = nf_put_att_text(ncid, %s, %s, %lu, &quot;,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                (asym-&gt;att.var == NULL?&quot;NF_GLOBAL&quot;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                                      :(char *)f77varncid(asym-&gt;att.var)),
</span><br>
<span class="quotelev2">&gt;&gt;   &lt;--- and here
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                f77escapifyname(asym-&gt;name),
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;                (len==0?1:len));
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        codedump(stmt);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        codedump(code);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        codeline(&quot;)&quot;);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        break;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Here is static const char* f77varncid():
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /* Compute the name for a given var's id*/
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; /* Watch out: the result is a static*/
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; static const char*
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; f77varncid(Symbol* vsym)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; {
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    const char* tmp1;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    char* vartmp;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    tmp1 = f77name(vsym);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    vartmp = poolalloc(strlen(tmp1)+strlen(&quot;_id&quot;)+1);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    strcpy(vartmp,tmp1);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    strcat(vartmp,&quot;_id&quot;);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    return vartmp;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; }
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; There are other lines in genf77.c that use f77varncid() in a print
</span><br>
<span class="quotelev2">&gt;&gt; statement, so the warnings do not occur every time f77varncid() provides a
</span><br>
<span class="quotelev2">&gt;&gt; string for %s:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;    if (nvars &gt; 0) {
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        f77skip();
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        f77comment(&quot;variable ids&quot;);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        for(ivar = 0; ivar &lt; nvars; ivar++) {
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;            Symbol* vsym = (Symbol*)listget(vardefs,ivar);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;            bbprintf0(stmt,&quot;integer %s;\n&quot;, f77varncid(vsym));
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;            codedump(stmt);
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;        }
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; The warnings occur in the only two instances where f77varncid() is used
</span><br>
<span class="quotelev2">&gt;&gt; in a conditional expression.  In both cases, the second operand is a
</span><br>
<span class="quotelev2">&gt;&gt; literal string, e.g., &quot;NF_GLOBAL&quot;.  I would have thought that a (static
</span><br>
<span class="quotelev2">&gt;&gt; const char*) and a string literal would be compatible types.  I
</span><br>
<span class="quotelev2">&gt;&gt; experimented with a (const char *) cast instead of a (char *) cast, but
</span><br>
<span class="quotelev2">&gt;&gt; that does not work.  I think it should.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I admit, I have an old copy of the C standard &#151; from 1990.  But, here's
</span><br>
<span class="quotelev2">&gt;&gt; my interpretation of what it says about this:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#149; 6.1.4 String literals, says string literals are converted to an array
</span><br>
<span class="quotelev2">&gt;&gt; of type char.  If the program attempts to modify a string literal, the
</span><br>
<span class="quotelev2">&gt;&gt; behavior is undefined.  It does not say that the type has the const type
</span><br>
<span class="quotelev2">&gt;&gt; qualifier (though, you would think it should).
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#149; 6.3.15 Conditional operator, says if the second and third operands are
</span><br>
<span class="quotelev2">&gt;&gt; pointers ..., the result type is a pointer to a type qualified with all the
</span><br>
<span class="quotelev2">&gt;&gt; type qualifiers of the types pointed-to by both operands.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; This would seem to explain the warning message, since the string literal
</span><br>
<span class="quotelev2">&gt;&gt; is (char *) and f77varncid() is (const char *).  However, 6.3.15 goes on to
</span><br>
<span class="quotelev2">&gt;&gt; say:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Furthermore, if both operands are pointers to ... differently qualified
</span><br>
<span class="quotelev2">&gt;&gt; versions of a compatible type, the result has the composite type.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Which leads me to believe you are allowed to mix const and non-const
</span><br>
<span class="quotelev2">&gt;&gt; versions of a compatible type.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Lastly:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#149; 6.5.3 Type qualifiers, says that the properties associated with
</span><br>
<span class="quotelev2">&gt;&gt; qualified types are meaningful only for expressions that are lvalues.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Seems to make the issue moot, since it says const-ness only applies to
</span><br>
<span class="quotelev2">&gt;&gt; lvalues.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; So, I think both 6.3.15 and 6.5.3 imply that (char *) and (const char *)
</span><br>
<span class="quotelev2">&gt;&gt; are compatible as the second and third operands in a conditional expression
</span><br>
<span class="quotelev2">&gt;&gt; which is not an lvalue, which is the case in this code.  As I mentioned
</span><br>
<span class="quotelev2">&gt;&gt; above, gcc does not complain about this code.  What do you think?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Larry Baker
</span><br>
<span class="quotelev2">&gt;&gt; US Geological Survey
</span><br>
<span class="quotelev2">&gt;&gt; 650-329-5608
</span><br>
<span class="quotelev2">&gt;&gt; baker_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I could inquire about the current status of this TPR if you like.  (Might
</span><br>
<span class="quotelev2">&gt;&gt; as well.)
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Larry Baker
</span><br>
<span class="quotelev2">&gt;&gt; US Geological Survey
</span><br>
<span class="quotelev2">&gt;&gt; 650-329-5608
</span><br>
<span class="quotelev2">&gt;&gt; baker_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On 17 Jan 2014, at 11:28 AM, Paul Hargrove wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Ralph,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; You are probably right that the string literals are a likely cause (type
</span><br>
<span class="quotelev2">&gt;&gt; char[] ? ).
</span><br>
<span class="quotelev2">&gt;&gt; I will poke at this a bit by adding (char *) casts to see which
</span><br>
<span class="quotelev2">&gt;&gt; argument(s) are actually the cause and get back to you.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; -Paul
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Fri, Jan 17, 2014 at 8:56 AM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Hi Paul
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Looking at these, I'm a tad puzzled. It would appear that PGI is
</span><br>
<span class="quotelev3">&gt;&gt;&gt; complaining about the fixed string being passed in the last three cases as
</span><br>
<span class="quotelev3">&gt;&gt;&gt; there is no (const char*)foo being used in those areas. Yet we use that
</span><br>
<span class="quotelev3">&gt;&gt;&gt; same logic elsewhere and your report isn't showing those as warnings.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Do you think it is the fixed string that is the issue - or is it the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (const char*) variable we need to recast?
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Jan 16, 2014, at 11:24 PM, Paul Hargrove &lt;phhargrove_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; My builds of the trunk with pgcc-13.10 turned up the following warnings:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/opal/mca/db/hash/db_hash.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 354)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/opal/mca/db/hash/db_hash.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 376)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/opal/mca/db/hash/db_hash.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 452)
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/opal/mca/db/hash/db_hash.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 534)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/orte/mca/state/base/state_base_fns.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 766)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/orte/mca/plm/rsh/plm_rsh_component.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 368)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  PGC-W-0095-Type cast required for this conversion
</span><br>
<span class="quotelev3">&gt;&gt;&gt; (/scratch/scratchdirs/hargrove/OMPI/openmpi-trunk-linux-x86_64-pgi-13.10/openmpi-1.9a1r30302/orte/mca/plm/rsh/plm_rsh_module.c:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 1337)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; I believe all of these are related to passing a (const char *) to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; OPAL_OUTPUT_VERBOSE().
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
<span class="quotelev3">&gt;&gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; Future Technologies Group
</span><br>
<span class="quotelev2">&gt;&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev2">&gt;&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev2">&gt;&gt;  _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Paul H. Hargrove                          PHHargrove_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Future Technologies Group
</span><br>
<span class="quotelev1">&gt; Computer and Data Sciences Department     Tel: +1-510-495-2352
</span><br>
<span class="quotelev1">&gt; Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</span><br>
<span class="quotelev1">&gt;  _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><p><p><pre>
-- 
Paul H. Hargrove                          PHHargrove_at_[hidden]
Future Technologies Group
Computer and Data Sciences Department     Tel: +1-510-495-2352
Lawrence Berkeley National Laboratory     Fax: +1-510-486-6900
</pre>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-13796/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>Previous message:</strong> <a href="13795.php">Larry Baker: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>In reply to:</strong> <a href="13794.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
<li><strong>Reply:</strong> <a href="13797.php">Ralph Castain: "Re: [OMPI devel] Warnings from pgcc-13.10"</a>
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
