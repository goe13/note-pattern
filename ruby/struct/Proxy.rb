module Proxy
    
    class SimpleProxy
        def initialize(member)
            @member = member
        end
        def dosome
            puts 'proxy dosome'
        end
        def doother
            @member.doother
        end
    end

    # 低性能方法动态方法
    # class SuperProxy
    #     def initialize(member)
    #         @member = member
    #     end

    #     def method_missing(name, *arg)
    #         @member.send(name,*arg) if @member.methods.include?(name)
    #     end

    #     def run
    #         puts 'proxy runing'
    #     end

    # end

    # 元编程
    class SuperProxy2
        def initialize(member)
            ((member.methods | self.methods) - self.methods).each do |md| 
                self.class.define_method(md){ |*arg|
                    member.send(md)
                }
            end
        end
        def run
            puts 'proxy2 runing'
        end
    end

    module Test
        class Member
            def initialize
                
            end
            def run
                puts 'member run'
            end
            def dosome
                puts 'member dosom'
            end
            def doother
                puts 'member doother'
            end
        end
        m = Member.new
        # sup = SuperProxy.new m
        # sup.run
        # sup.dosome
        # sup.doother

        sup2 = SuperProxy2.new m
        sup2.run
        sup2.dosome
        sup2.doother
    end

end