module Bridge

    class Member1
        def initialize
            
        end
        def call1
            puts 'Member1 call'
        end
    end
    class Member2
        def initialize
            
        end
        def call1
            puts 'Member2 call'
        end
    end

    class Bridge
        def initialize
            
        end
        def setMember(member)
            @member = member
        end
        def call1
            @member.call1
        end
    end

    module Test
        b = Bridge.new
        m1 = Member1.new
        m2 = Member2.new

        b.setMember m1
        puts b.call1
        b.setMember m2
        puts b.call1
    end
    
end