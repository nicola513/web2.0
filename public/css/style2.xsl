<?xml version = "1.0"?>

<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="channel">

		<html>
			<head>
				<title> CCN1016 Assignment 1 - My Blog Page </title>
			</head>

			<body style="background-color:#EEEEEE">

				<a name="top"></a>
				<h1 align="center"><font face="Forte"> My Blog </font></h1>

				<table align="center" width="60%">
					<xsl:for-each select="item">
					<hr />
					<div style="background-color:Pink;padding:4px">
						<span style="font-weight:bold;font-style:italic">
							<font color="navy" style="italic" face="JazzTextExtended" size="5">
								<xsl:value-of select="title" />:
								<xsl:value-of select="description"/>
							</font>
						</span>
					</div>
					

					</xsl:for-each>

				</table>

			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
