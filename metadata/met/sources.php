
<H1><A NAME="SEC23" HREF="metdata_toc.html#SEC23">Sources</A></H1>
<P>
This chapter contains details about the records used as source for the
meteorological data stored in the Electronic Rothamsted Archive. For separate
periods there is information on what variables were recorded, the quality of
the data, and reasons for choosing one variable instead of another.
<P>
<UL>
<LI><A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>
<LI><A href="<?php echo $request; ?>#SEC25">January 1857 -- December 1859</A>
<LI><A href="<?php echo $request; ?>#SEC26">January 1860 -- December 1860</A>
<LI><A href="<?php echo $request; ?>#SEC27">January 1861 -- May 1868</A>
<LI><A href="<?php echo $request; ?>#SEC28">June 1868 -- August 1870</A>
<LI><A href="<?php echo $request; ?>#SEC29">July 1873 -- November 1876</A>
<LI><A href="<?php echo $request; ?>#SEC30">1941 -- 1949</A>: 1941 -- 1949
<LI><A href="<?php echo $request; ?>#SEC36">1966 -- 1970</A>
<LI><A href="<?php echo $request; ?>#SEC40">1989 -- present</A>
</UL>
<P>
<H2><A NAME="SEC24" HREF="metdata_toc.html#SEC24">February 1853 -- December 1856</A></H2>
<P>
The earliest meteorological records from Rothamsted were written in two large
hardback notebooks described in this documentation as the <EM>original</EM>
databook, and the <EM>copy</EM> databook. 
<P>
The following variables were recorded:
<P>
<DL COMPACT>
<P>
<DT><STRONG>Large Rain Gauge (RAINL)</STRONG>
<DD>In the <EM>original</EM> databook, the weight of rain collected in the large
rain gauge was recorded in pounds and ounces at 9.30am (RAINL_LB_AM,
RAINL_OZ_AM) and 4.30pm (RAINL_LB_PM, RAINL_OZ_PM) each day.
<P>
@dfindex RAINL_LB_AM
@dfindex RAINL_OZ_AM
@dfindex RAINL_LB_PM
@dfindex RAINL_OZ_PM
<P>
In the <EM>copy</EM> databook the totals for the days were entered (RAINL_TOTLB,
RAINL_TOTOZ) and converted to inches (RAINL_TOTIN). Monthly totals were
calculated. These values were also corrected for errors caused by melting
snow, overflowing etc, so these have been used for the variable RAINL.
<P>
@dfindex RAINL_TOTOZ
@dfindex RAINL_TOTIN
@dfindex RAINL
<P>
<DT><STRONG>Small Rain Gauge (RAINS)</STRONG>
<DD>In the <EM>original</EM> databook, rain collected in the small rain gauge was
recorded in inches at 9.30am (RAINS_AM) and 4.30pm (RAINS_PM) each day.
<P>
@dfindex RAINS
@dfindex RAINS_AM
@dfindex RAINS_PM
<P>
In the <EM>copy</EM> databook the total for the day was entered (RAINS_TOT) and a
monthly total was also calculated. It is these values that are taken for the
standard variable RAIN.
<P>
@dfindex RAINS_TOT
@dfindex RAIN
<P>
<DT><STRONG>Wind direction</STRONG>
<DD>In the <EM>original</EM> databook, the prevailing wind direction was recorded at
9.30am (WDIR) and 4.30pm (WDIR_PM) each day. Note that the 9.30am value is used
for the variable WDIR to retain continuity with later years.
<P>
@dfindex WDIR
@dfindex WDIR_PM
<P>
<DT><STRONG>Remarks</STRONG>
<DD>In the <EM>original</EM> databook, various comments on the weather may have been
made at 9.30am (REMARKS) and 4.30pm (REMARKS_PM).
<P>
@dfindex REMARKS
@dfindex REMARKS_PM
<P>
</DL>
<P>
<H2><A NAME="SEC25" HREF="metdata_toc.html#SEC25">January 1857 -- December 1859</A></H2>
<P>
From the beginning of 1857 to the end of 1859 the <EM>copy</EM> databook was not
used. The <EM>original</EM> databook, however, was the same as for section <A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>.
<P>
For this period the variables RAINL and RAIN were derived from the large
and small rain gauge values as recorded in the <EM>original</EM> databook.
<P>
@dfindex RAINL
@dfindex RAIN
<P>
<H2><A NAME="SEC26" HREF="metdata_toc.html#SEC26">January 1860 -- December 1860</A></H2>
<P>
<DL COMPACT>
<P>
<DT><STRONG><EM>Original</STRONG> databook</EM>
<DD>This was the same as for section <A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>, except that no
comments (REMARKS and REMARKS_PM) were made.
<P>
@dfindex REMARKS
@dfindex REMARKS_PM
<P>
<DT><STRONG><EM>Copy</STRONG> databook</EM>
<DD>For this period the <EM>copy</EM> book does not contain total daily rainfall
measurements; as in the <EM>original</EM> book the 9.30am and 4.30pm readings
are given, for the large rain gauge in pounds and ounces (RAINL_LB_AM,
RAINL_OZ_AM, RAINL_LB_PM, RAINL_OZ_PM) as well as in inches (RAINL_IN_AM,
RAINL_IN_PM). The small rain gauge measurement was given in inches (RAINS_AM,
RAINS_PM). Monthly totals were still given.
<P>
@dfindex RAINL_LB_AM
@dfindex RAINL_OZ_AM
@dfindex RAINL_LB_PM
@dfindex RAINL_OZ_PM
@dfindex RAINL_IN_AM
@dfindex RAINL_IN_PM
@dfindex RAINS_AM
@dfindex RAINS_PM
<P>
</DL>
<P>
Because the rainfall values in the <EM>copy</EM> databook were corrected for
errors caused by melting snow, overflowing etc, they should be used for the
variables RAINL (large rain gauge) and RAIN (small rain gauge). However, the
data for this period have not been correctly entered from the <EM>copy</EM> book,
so for now RAINL and RAIN shall be taken from the <EM>original</EM> databook.
<P>
@dfindex RAIN
@dfindex RAINL
<P>
<H2><A NAME="SEC27" HREF="metdata_toc.html#SEC27">January 1861 -- May 1868</A></H2>
<P>
<DL COMPACT>
<P>
<DT><STRONG><EM>Original</STRONG> databook</EM>
<DD>This was exactly the same as for section <A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>.
<P>
<DT><STRONG><EM>Copy</STRONG> databook</EM>
<DD>This was exactly the same as for section <A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>.
<P>
</DL>
<P>
Because the rainfall values in the <EM>copy</EM> databook were corrected for
errors caused by melting snow, overflowing etc, they have been used for the
variables RAINL (large rain gauge) and RAIN (small rain gauge).
<P>
@dfindex RAIN
@dfindex RAINL
<P>
<H2><A NAME="SEC28" HREF="metdata_toc.html#SEC28">June 1868 -- August 1870</A></H2>
<P>
After the 31 May 1868 the <EM>original</EM> data book was no longer used for
meteorological records. For the period June 1868 -- August 1870, the
<EM>copy</EM> continued in the same way as for section <A href="<?php echo $request; ?>#SEC24">February 1853 -- December 1856</A>.
<P>
<H2><A NAME="SEC29" HREF="metdata_toc.html#SEC29">July 1873 -- November 1876</A></H2>
<P>
From July 1873 to November 1876, there were 3 gauges in operation: `small',
(RAIN5) `old large' (RAINL_OLD) and `new large' or `glass' (RAINL). Note that
readings from the `new large' gauge are used as the RAINL value, and also as
the RAIN value during this period of overlap as this gauge is more reliable.
<P>
@dfindex RAIN5
@dfindex RAINL_OLD
@dfindex RAINL
@dfindex RAIN
<P>
The data for this period have been recorded from two sources as follows:
<P>
<DL COMPACT>
<DT><STRONG>July 1873 -- August 1873</STRONG>
<DD>For these 2 months the surviving records are split between two sources:
<UL>
<DT><STRONG></STRONG>
<DD>in the `copy' data book, measurements from the `new large' and `small' rain
gauges were recorded.
<DT><STRONG></STRONG>
<DD>in data sheets made as an office copy, measurements from the `old large' rain
gauges and the three drainage gauges were recorded.
</UL>
<P>
<DT><STRONG>September 1873 -- November 1873</STRONG>
<DD>For this period the data are taken only from the `copy' data book which
contained recorded measurements from the `old large', `new large' and `small'
rain gauges, the drainage gauges, wind direction at 9am, and general remarks.
<P>
</DL>
<P>
Up until August 1873 rainfall was recorded at 9am and 4.30pm. For continuity
with later records the amount collected at 4.30pm (given in the <EM>original</EM>
databook) should be added to the amount collected at 9am on the next day.
Monthly totals should then be calculated from the 2nd of the month to the 1st
of the next month.
<P>
The <EM>original</EM> databook contains 4.30pm readings up to May 1868. The
<EM>copy</EM> contains them for the period March 1872 -- August 1873 but I don't
think these have been typed. Unfortunately we seem to be missing June 1868 --
February 1872.
<P>
<H2><A NAME="SEC30" HREF="metdata_toc.html#SEC30">1941 -- 1949</A></H2>
<P>
These are the cumulative changes from 1941 onwards:
<P>
<H3><A NAME="SEC31" HREF="metdata_toc.html#SEC31">January 1941 -- December 1944</A></H3>
<P>
There were two datasheets for this period: a white one and a pink one. Both
sides of the pink sheet were used.
<P>
<List the fields>
<P>
<H3><A NAME="SEC32" HREF="metdata_toc.html#SEC32">January 1945 -- August 1946</A></H3>
<P>
<UL>
<P>
<LI>
Monthly totals were given on the back of the pink sheet.
<P>
<LI>
The 8 inch rain gauge (RAIN8) was recorded on the back of the pink sheet rather
than on the white sheet.
<P>
@dfindex RAIN8
<P>
<LI>
Recording of the temperature 100cm under bare soil (E100T) was recorded on the
white sheet.
<P>
@dfindex E100T
<P>
</UL>
<P>
<H3><A NAME="SEC33" HREF="metdata_toc.html#SEC33">September 1946 -- January 1947</A></H3>
<P>
<UL>
<P>
<LI>
From September 1946 the temperature 30cm under grass (G30T) was recorded in
degrees Fahrenheit, rather than Kelvin.
<P>
@dfindex G30T
<P>
<LI>
A banked 5 inch rain gauge (RAIN5BANKED) was introduced in October 1946, listed
on the back of the pink sheet.
<P>
@dfindex RAIN5BANKED
<P>
<LI>
From October 1946, the daily run of wind (WINDRUN) in miles was recorded on the
back of the pink sheet.
<P>
@dfindex WINDRUN
<P>
</UL>
<P>
<H3><A NAME="SEC34" HREF="metdata_toc.html#SEC34">February 1947 -- December 1947</A></H3>
<P>
Minor changes were made to the white sheet: 2 or 3 empty columns were
added between the 20cm under grass temperature reading (G20T), and the
30cm under bare soil reading (E30T).
<P>
@dfindex G20T
@dfindex E30T
<P>
<H3><A NAME="SEC35" HREF="metdata_toc.html#SEC35">January 1948 -- December 1948</A></H3>
<P>
In January 1948 use of the banked 5 inch rain gauge (RAIN5BANKED) was
discontinued.
<P>
@dfindex RAIN5BANKED
<P>
<H2><A NAME="SEC36" HREF="metdata_toc.html#SEC36">1966 -- 1970</A></H2>
<P>
The meteorological data were entered from the Meteorological Office
Return Forms as over other periods. This section simply provides a note
of some problems with the radiation, evaporation and rin of wind data as
recorded. Sometimes the daily radiation figure or evaporation figure was
not recorded and carried over to a subsequent date. Where this happened
all the values were recorded as missing, even the final one which was a
total over the period. Thus monthly or yearly summaries of radiation or
evaporation will be incorrect. You can use the data below to apply a
correction.
<P>
<H3><A NAME="SEC37" HREF="metdata_toc.html#SEC37">Radiation</A></H3> </p>
<P>
<PRE>
    Missing Period        Total at end of
Start        End          Period [J/cm2]
----------   ----------   ---------------
07/02/1966 - 08/02/1966   148
01/04/1968 - 02/04/1968   283
14/08/1969 - 15/08/1969   464
15/05/1970 - 16/05/1970   745
13/03/1972 - 14/03/1972   528
18/07/1972 - 19/07/1972   573
09/05/1975 - 10/05/1975   480
25/09/1975 - 26/09/1975   413
</PRE>     </p>
<P>
<H3><A NAME="SEC38" HREF="metdata_toc.html#SEC38">Evaporation</A></H3>  </p>
<P>
<PRE>
    Missing Period        Total at end of
Start        End          Period
----------   ----------   ---------------
13/11/1965 - 17/11/1965   .04
24/03/1966 - 25/03/1966   .07
07/02/1967 - 08/02/1967   .11
17/02/1967 - 18/02/1967   .03
02/02/1968 - 08/02/1968   .02
14/02/1968 - 16/02/1968   .14
17/02/1968 - 21/02/1968   .06
07/03/1968 - 08/03/1968   .07
15/03/1968 - 16/03/1968   .11
04/03/1969 - 09/03/1969   .21
23/03/1969 - 24/03/1969   .08
05/02/1970 - 07/02/1970   .04
28/09/1970 - 29/09/1970   .13
03/03/1971 - 08/03/1971   .16
10/03/1972 - 12/03/1972   .06
16/04/1972 - 17/04/1972   .11
13/02/1973 - 18/02/1973   .05
23/02/1973 - 25/02/1973   .05
</PRE>
<P>
<H3><A NAME="SEC39" HREF="metdata_toc.html#SEC39">Run of Wind</A></H3>  </p>
<P>
<PRE>
    Missing Period        Total at end of
Start        End          Period
----------   ----------   ---------------
14/04/1972 - 15/04/1972   307
16/05/1972 - 17/05/1972   266
24/08/1976 - 25/08/1976   282
</PRE>
<P>
<H2><A NAME="SEC40" HREF="metdata_toc.html#SEC40">1989 -- present</A></H2>
<P>
Since 1989 the Rothamsted Meteorological records have been recorded in
two ways: the Meteorological Office Return forms are still filled in as
they have been since 1915, but the full set of Rothamsted data is
entered daily into a PC-based database (written in dBase). The data from
this database is incorporated into ERA at the end of each year.<\p>

