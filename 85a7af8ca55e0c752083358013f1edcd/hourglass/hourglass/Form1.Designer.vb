<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmHourGlass
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.btnCreate = New System.Windows.Forms.Button()
        Me.txtHeight = New System.Windows.Forms.TextBox()
        Me.txtCapacity = New System.Windows.Forms.TextBox()
        Me.txtHourGlass = New System.Windows.Forms.TextBox()
        Me.lblHeight = New System.Windows.Forms.Label()
        Me.lblCapacity = New System.Windows.Forms.Label()
        Me.btnExit = New System.Windows.Forms.Button()
        Me.lblError1 = New System.Windows.Forms.Label()
        Me.lblError2 = New System.Windows.Forms.Label()
        Me.SuspendLayout()
        '
        'btnCreate
        '
        Me.btnCreate.Location = New System.Drawing.Point(4, 293)
        Me.btnCreate.Name = "btnCreate"
        Me.btnCreate.Size = New System.Drawing.Size(78, 30)
        Me.btnCreate.TabIndex = 0
        Me.btnCreate.Text = "Create"
        Me.btnCreate.UseVisualStyleBackColor = True
        '
        'txtHeight
        '
        Me.txtHeight.Location = New System.Drawing.Point(308, 12)
        Me.txtHeight.Name = "txtHeight"
        Me.txtHeight.Size = New System.Drawing.Size(100, 27)
        Me.txtHeight.TabIndex = 1
        '
        'txtCapacity
        '
        Me.txtCapacity.Location = New System.Drawing.Point(308, 54)
        Me.txtCapacity.Name = "txtCapacity"
        Me.txtCapacity.Size = New System.Drawing.Size(100, 27)
        Me.txtCapacity.TabIndex = 2
        '
        'txtHourGlass
        '
        Me.txtHourGlass.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle
        Me.txtHourGlass.Location = New System.Drawing.Point(104, 170)
        Me.txtHourGlass.Multiline = True
        Me.txtHourGlass.Name = "txtHourGlass"
        Me.txtHourGlass.ReadOnly = True
        Me.txtHourGlass.RightToLeft = System.Windows.Forms.RightToLeft.No
        Me.txtHourGlass.ScrollBars = System.Windows.Forms.ScrollBars.Both
        Me.txtHourGlass.Size = New System.Drawing.Size(647, 240)
        Me.txtHourGlass.TabIndex = 3
        Me.txtHourGlass.TextAlign = System.Windows.Forms.HorizontalAlignment.Center
        '
        'lblHeight
        '
        Me.lblHeight.AutoSize = True
        Me.lblHeight.Location = New System.Drawing.Point(80, 15)
        Me.lblHeight.Name = "lblHeight"
        Me.lblHeight.Size = New System.Drawing.Size(211, 20)
        Me.lblHeight.TabIndex = 4
        Me.lblHeight.Text = "Enter an integer greater than 1"
        '
        'lblCapacity
        '
        Me.lblCapacity.AutoSize = True
        Me.lblCapacity.Location = New System.Drawing.Point(64, 57)
        Me.lblCapacity.Name = "lblCapacity"
        Me.lblCapacity.Size = New System.Drawing.Size(227, 20)
        Me.lblCapacity.TabIndex = 5
        Me.lblCapacity.Text = "Enter an integer between (0-100)"
        '
        'btnExit
        '
        Me.btnExit.Location = New System.Drawing.Point(4, 338)
        Me.btnExit.Name = "btnExit"
        Me.btnExit.Size = New System.Drawing.Size(75, 30)
        Me.btnExit.TabIndex = 6
        Me.btnExit.Text = "Exit"
        Me.btnExit.UseVisualStyleBackColor = True
        '
        'lblError1
        '
        Me.lblError1.AutoSize = True
        Me.lblError1.ForeColor = System.Drawing.Color.Red
        Me.lblError1.Location = New System.Drawing.Point(100, 102)
        Me.lblError1.Name = "lblError1"
        Me.lblError1.Size = New System.Drawing.Size(0, 20)
        Me.lblError1.TabIndex = 7
        '
        'lblError2
        '
        Me.lblError2.AutoSize = True
        Me.lblError2.ForeColor = System.Drawing.Color.Red
        Me.lblError2.Location = New System.Drawing.Point(100, 147)
        Me.lblError2.Name = "lblError2"
        Me.lblError2.Size = New System.Drawing.Size(0, 20)
        Me.lblError2.TabIndex = 8
        '
        'frmHourGlass
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(8.0!, 20.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(774, 422)
        Me.Controls.Add(Me.lblError2)
        Me.Controls.Add(Me.lblError1)
        Me.Controls.Add(Me.btnExit)
        Me.Controls.Add(Me.lblCapacity)
        Me.Controls.Add(Me.lblHeight)
        Me.Controls.Add(Me.txtHourGlass)
        Me.Controls.Add(Me.txtCapacity)
        Me.Controls.Add(Me.txtHeight)
        Me.Controls.Add(Me.btnCreate)
        Me.Font = New System.Drawing.Font("Segoe UI", 11.25!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Margin = New System.Windows.Forms.Padding(4)
        Me.Name = "frmHourGlass"
        Me.Text = "Hour Glass"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents btnCreate As System.Windows.Forms.Button
    Friend WithEvents txtHeight As System.Windows.Forms.TextBox
    Friend WithEvents txtCapacity As System.Windows.Forms.TextBox
    Friend WithEvents txtHourGlass As System.Windows.Forms.TextBox
    Friend WithEvents lblHeight As System.Windows.Forms.Label
    Friend WithEvents lblCapacity As System.Windows.Forms.Label
    Friend WithEvents btnExit As System.Windows.Forms.Button
    Friend WithEvents lblError1 As System.Windows.Forms.Label
    Friend WithEvents lblError2 As System.Windows.Forms.Label

End Class
